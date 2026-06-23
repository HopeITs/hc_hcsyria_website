<?php

namespace App\Livewire;

use Jenssegers\Agent\Agent;
use Livewire\Component;
use App\Project;
use App\Place;
use App\Donor;
use Illuminate\Support\Collection; // <- import the correct one!
class MicroProjects extends Component
{
    public bool $isMobile = false;
    public $search = '';
    public $donor = '';
    public $city = '';
    public $hasVideo = false;

    public $tempSearch = '';
    public $tempDonor = '';
    public $tempCity = '';
    public $tempHasVideo = false;

    public $language = 'english';
    public int $limit = 15;
    public int $totalCount = 0;
    public int $totalProjectsCount = 0;
    public $projectsLocation;
    public $projectDetailsModal = null;
    public Collection $projects;
    public Collection $projectsList;
    public Collection $uniqueProjects ;
    public Collection $uniqueBeneficiaries ;
    public Collection $donors;
    public Collection $cities;
    protected $listeners = ['setSearchFromTypeahead', 'applyFiltersManually'];
    public string $activeView = 'tiles';

    public function mount()
    {
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
        $this->agent = $agent;
        $this->projectDetailsModal = request()->get('projectDetailsModal');
        $this->donors = Donor::orderBy('name')->get();
        $this->cities = Place::whereIn('id', [1,2,3,4,6,7,8])
        ->orderBy('rank')
            ->get();

        // initialize temporary values
        $this->tempSearch   = $this->search;
        $this->tempDonor    = $this->donor;
        $this->tempCity     = $this->city;
        $this->tempHasVideo = $this->hasVideo;
        $this->totalProjectsCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count();
        $this->projectsList = collect();
        $query = Project::with([$this->language])->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2]);
        $this->projectsList = (clone $query)
            ->orderBy('MPE_PublishDate', 'desc')
            ->get();
        $this->uniqueProjects = $this->projectsList
            ->flatMap(fn ($project) => [
                optional($project->{$this->language})->MPE_Name,
                (string) $project->id,
            ])
            ->filter()
            ->unique()
            ->values();
        $this->uniqueBeneficiaries = $this->projectsList
            ->flatMap(fn ($project) => [
                $project->MPE_BeneficiaryName,
                $project->MPE_PartnerName !== '0' ? $project->MPE_PartnerName : null,
                $project->MPE_PartnerName2 !== '0' ? $project->MPE_PartnerName2 : null,
            ])
            ->filter()
            ->unique()
            ->values();
        $this->projects = collect();
        $this->loadProjects();
    }

    /** Apply filters when button is clicked */
    public function applyFilters(): void
    {
        $this->search       = $this->tempSearch;
        $this->donor        = $this->tempDonor;
        $this->city         = $this->tempCity;
        $this->hasVideo     = $this->tempHasVideo;

        $this->limit = 15;
        $this->loadProjects();

//        logger()->info('Filters applied', [
//            'search' => $this->search,
//            'donor' => $this->donor,
//            'city' => $this->city,
//            'hasVideo' => $this->hasVideo,
//            'projects' => $this->projects->pluck('id')
//        ]);
        $this->dispatch('scroll-to-projects');
    }


    public function getHasMoreProperty(): bool
    {
        return $this->totalCount > $this->projects->count();
    }


    public function getTotalProjectsProperty(): int
    {
        return Project::count();
    }

    public function getCityNameProperty(): string
    {
        // if tempCity is empty -> show "All cities" text
        if (empty($this->tempCity)) {
            return __('projects.all_cities');
        }

        // try to find the city in the already-loaded collection
        $city = $this->cities->firstWhere('id', $this->tempCity);
        return $city->name ?? __('projects.all_cities');
    }

    public function getDonorNameProperty(): string
    {
        return $this->tempDonor
            ? optional($this->donors->firstWhere('id', $this->tempDonor))->name ?? __('projects.all_donors')
            : __('projects.all_donors');
    }
    public function loadProjects(): void
    {
        $query = Project::with([
            $this->language,
            'firstImage','images' => function ($q) {
                $q->orderBy('image_order', 'asc');
            },
            'donor'])->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2]);

        $search = trim((string) $this->search);

        if ($search !== '') {
            if (ctype_digit($search)) {
                $query->where('id', $search);
            } else {
                $query->where(function ($q) use ($search) {
                    $q->where('MPE_BeneficiaryName', 'like', '%' . $search . '%')
                        ->orWhere('MPE_PartnerName', 'like', '%' . $search . '%')
                        ->orWhere('MPE_PartnerName2', 'like', '%' . $search . '%')
                        ->orWhereHas($this->language, function ($languageQuery) use ($search) {
                            $languageQuery->where('MPE_Name', 'like', '%' . $search . '%')
                                ->orWhere('MPE_ExpSkill', 'like', '%' . $search . '%')
                                ->orWhere('MPE_Suffering', 'like', '%' . $search . '%');
                        });
                });
            }
        }

        if ($this->donor !== '' && $this->donor !== null) {
            $query->where('MPE_Donor', $this->donor);
        }

        if ($this->city !== '' && $this->city !== null) {
            $query->where('MPE_City', $this->city);
        }

        if ($this->hasVideo) {
            $query->where('MPE_Video', '!=', '0')
                ->where('MPE_Video', '!=', '');
        }

        $this->totalCount = $query->count(); // total matching projects
        $this->projects = (clone $query)
            ->orderBy('MPE_PublishDate', 'desc')
            ->take($this->limit)
            ->get();
        // Trigger browser event
        $this->dispatch('reinit-typeahead', [
            'projects' => $this->projects->map(fn ($project) => optional($project->{$this->language})->MPE_Name)->filter()->toArray(),
            'beneficiaries' => $this->projects->pluck('MPE_BeneficiaryName')->filter()->toArray(),
        ]);
        // If a deep-link project is requested but not in the list, fetch it separately
        if ($this->projectDetailsModal && !$this->projects->contains('id', $this->projectDetailsModal)) {
            $extraProject = Project::find($this->projectDetailsModal);
            if ($extraProject) {
                $this->projects->push($extraProject);
            }
        }
        $projectsLocation = (clone $query)->get(['id', 'latitude', 'longtitude', 'MPE_BeneficiaryName']);

        $markers = $projectsLocation
            ->filter(fn($p) => $p->latitude && $p->longtitude)
            ->map(fn($p) => [
                'lat' => $p->latitude,
                'lng' => $p->longtitude,
                'name' => optional($p->{$this->language})->MPE_Name,
                'beneficiary' => $p->MPE_BeneficiaryName,
            ])
            ->values();

        $this->dispatch('updateMapMarkers', markers: $markers);

    }

    public function loadMore(): void
    {
        $this->limit += 15;
        $this->loadProjects();

        // After loading more, send only the newly added markers
        $newProjects = $this->projects->slice(-15);

        $newMarkers = $newProjects
            ->filter(fn($p) => $p->latitude && $p->longtitude)
            ->map(fn($p) => [
                'id' => $p->id,
                'lat' => $p->latitude,
                'lng' => $p->longtitude,
                'name' => optional($p->{$this->language})->MPE_Name,
                'beneficiary' => $p->MPE_BeneficiaryName,
            ])
            ->values();

        // emit separate event for appending markers
        $this->dispatch('appendMapMarkers', markers: $newMarkers);
    }

    public function render()
    {
        return view('livewire.micro-projects');
    }


    public function setSearchFromTypeahead($value)
    {
        $this->tempSearch = $value;
    }
    public function applyFiltersManually()
    {
        $this->applyFilters();
    }
}
