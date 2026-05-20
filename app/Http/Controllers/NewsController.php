<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Edition;
use App\Mail\UserEmail;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\Subscriber;
use App\NewsEnglish;
use App\Place;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    const NEWS = 'News';
    const TAGS = 'Tags';
    const EDITIONS = 'Editions';
    const SUBSCRIBERS = 'Subscribers';
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $newsArticles = News::with('english', 'edition', 'tags')->where('type', '0')->where('online', '1')->orderBy('date', 'desc')->get();        $newsProducts = News::with('english', 'edition', 'tags')->where('type', '1')->where('online', '1')->get();
        $newsShortParagraphs = News::with('english', 'edition', 'tags')->where('type', '2')->where('online', '1')->orderBy('date', 'desc')->get();
        $newsVideos = News::with('english', 'edition', 'tags')->where('type', '3')->where('online', '1')->orderBy('date', 'desc')->get();
        $newsPending = News::with('english', 'edition', 'tags')->where('online', '0')->orderBy('date', 'desc')->get();
        $newsProducts = News::with('english', 'edition', 'tags')->where('type', '1')->where('online', '1')->orderBy('date', 'desc')->get();
        $newsSubscribers = Subscriber::all();
        $allTags = Tag::all();

        return view('new.admin.news.index', [
            'newsArticles' => $newsArticles,
            'newsSubscribers' => $newsSubscribers,
            'newsProducts' => $newsProducts,
            'newsShortParagraphs' => $newsShortParagraphs,
            'newsVideos' => $newsVideos,
            'newsPending' => $newsPending,
            'allTags' => $allTags
        ]);
    }
    public function create()
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $allTagsString = Tag::pluck('name')->implode(',');
        $editions = Edition::all();
        $places = Place::all();

        return view('new.admin.news.create', [
            'microProjects' => $microProjects,
            'allTagsString' => $allTagsString,
            'places' => $places,
            'editions' => $editions
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'type' => 'required|numeric',
        'news_tags' => 'required|string',
        'place_id' => 'required',
        'edition_id' => 'nullable|numeric',
        'rank' => 'nullable|numeric',
        'title' => 'required|max:100',
        'description' => 'nullable|max:900',
        'content' => 'required',
        'video' => 'required_if:type,3|max:100',
        'date' => 'required',
    ]);

    $news = new News;
    $news->type = $request->input('type');
    $news->place_id = $request->input('place_id');
    $news->edition_id = $request->input('edition_id');

    $news->rank = $request->input('rank') ?? 1;
    $news->online = 0;

    $news->date = $request->input('date') ?? now();
    $news->priority_status = $request->input('priority_status', 0);

    $news->video = $request->filled('video') ? $request->input('video') : '0';

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = '/files/news/';
        $file->move(public_path($path), $fileName);
        $news->file = $path . $fileName;
    } else {
        $news->file = '0';
    }

    if ($request->input('type') == '1')
    {
        $news->project_id = $request->filled('project_id') ? $request->input('project_id') : '0';
    }

    $news->save();

    if ($request->filled('news_tags')) {
        $tagNames = explode(',', $request->news_tags);

        $tagIds = [];
        foreach ($tagNames as $name) {
            $trimmedName = trim($name);
            if (empty($trimmedName)) continue;
            $tag = Tag::where('name', $trimmedName)->first();
            if ($tag) {
                $tagIds[] = $tag->id;
            }
            $news->tags()->sync($tagIds);
        }
    }

    $engnews = new NewsEnglish;
    $engnews->news_id = $news->id;
    $engnews->title = $request->input('title');
    $engnews->description = $request->input('description') ?? '0';
    $engnews->content = $request->input('content');
    $engnews->save();

    $this->saveToLog(self::NEWS, $news->id, 'News Created');
    return redirect()->action([NewsController::class, 'index'])->with('success', 'News ' . $news->id . ' has been created and is pending approval.');
    }

    /////////////////////////////////////////////////////////////////////////////////
    public function show($id)
    {
        $news = News::with('english', 'images', 'place')->findOrFail($id);
        return view('new.admin.news.view', ['news' => $news]);
    }

    public function edit($id, Request $request)
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $allTagsString = Tag::pluck('name')->implode(',');
        $places = Place::all();

        $newsData = News::with('english', 'tags')->where('id', $id)->first();
        $existingTagsString = $newsData->tags->pluck('name')->implode(',');

        $ref = $request->query('ref', 'index');

        return view('new.admin.news.edit', [
            'newsData' => $newsData,
            'allTagsString' => $allTagsString,
            'places' => $places,
            'microProjects' => $microProjects,
            'existingTagsString' => $existingTagsString,
            'ref' => $ref,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|numeric',
            'news_tags' => 'required|string',
            'place_id' => 'required',
            'title' => 'required|max:100',
            'description' => 'nullable|max:900',
            'content' => 'required',
            'rank' => 'nullable|numeric',
            'video' => 'required_if:type,3|nullable|max:100',
            'date' => 'required'
        ]);

        $news = News::findOrFail($id);
        $newsPrev = clone $news;

        $news->online = 0;
        $news->type = $request->input('type');

        $news->video = ($request->input('type') == '3') ? $request->input('video') : '0';

        if ($news->isDirty('video')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Video Edited', $newsPrev->video, $news->video);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = '/files/news/';
            $file->move(public_path($path), $fileName);
            $news->file = $path . $fileName;
        }

        $news->rank = $request->input('rank') ?? $news->rank ?? 1;
        $news->place_id = $request->input('place_id');
        $news->date = $request->input('date');

        $news->save();

        if ($request->filled('news_tags')) {
            $tagNames = explode(',', $request->news_tags);
            $tagIds = [];
            foreach ($tagNames as $name) {
                $trimmedName = trim($name);
                if (empty($trimmedName)) continue;
                $tag = Tag::where('name', $trimmedName)->first();
                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            $news->tags()->sync($tagIds);
        }

        $engNews = NewsEnglish::where('news_id', $id)->first();
        if ($engNews) {
            $engNews->title = $request->input('title');
            $engNews->description = $request->input('description') ?? '0';
            $engNews->content = $request->input('content');
            $engNews->save();
        }

        $ref = $request->input('ref');

        if ($ref === 'dashboard') {
            return redirect()->route('home')->with('success', 'News updated successfully.');
        }
        else if ($ref === 'show') {
            return redirect()->route('news.show', [$id])->with('success', 'News updated successfully.');
        }
        return redirect()->route('news.index', ['tab' => 'Pending'])
            ->with('success', 'News updated successfully.');
    }
    public function destroy($id)
    {
        $news = News::find($id);

        $news->tags()->detach();

        News::destroy($id);
        NewsEnglish::where('news_id', $news->id)->delete();
//        NewsFrench::where('news_id', $news->id)->delete();
        $images = NewsImage::where('news_id', $news->id)->get();
        NewsImage::where('news_id', $news->id)->delete();
        foreach ($images as $image) {
            File::delete($image->path, substr($image->path, 0, -4) . 'b.jpg');
        }
        $this->saveToLog(self::NEWS, $news->id, 'News deleted');
        return redirect()->back()->with('success', 'News ' . $news->id . ' deleted successfully');
    }

    public function online(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        if(!$news) {
            return redirect()->route('news.index')->with('error', 'News item not found.');
        }
        $news->online = '1';
        $news->save();

        $this->saveToLog(self::NEWS, $news->id, 'News Status: Online');

        return redirect()->route('news.index', ['tab' => 'Article'])
            ->with('success', 'News #' . $news->id . ' has been published successfully!');
    }
    public function offline(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        $news->online = '0';
        $news->save();

        $this->saveToLog(self::NEWS, $news->id, 'News Status: Offline');

        return redirect()->back()->with('success', 'News #' . $news->id . ' is now Offline.');
    }
    public function edition()
    {
        $editions = Edition::all();
        return view('new.admin.news.edition', ['editions' => $editions,]);
    }

    public function edition_store(Request $request)
    {
//        $request->validate(['name' => 'required', 'name_french' => 'required',]);
        $request->validate(['name' => 'required']);

        $edition = new Edition;
        $edition->name = $request->input('name');
//        $edition->name_french = $request->input('name_french');
        $edition->name_french = '';
        $edition->save();

        $this->saveToLog(self::EDITIONS, $edition->id, 'one of edition Created');
        return redirect()->back()->with('success', 'Edition ' . $edition->id . ' has been created');
    }

    public function edition_destroy($id)
    {
        Edition::destroy($id);
        $this->saveToLog(self::EDITIONS, $id, 'Edition deleted');
        return redirect()->back()->with('success', 'Edition ' . $id . ' deleted successfully');
    }

    public function subscriber_destroy($id)
    {
        Subscriber::destroy($id);
        $this->saveToLog(self::SUBSCRIBERS, $id, 'Subscriber deleted');
        return redirect()->back()->with('success', 'Subscriber ' . $id . ' deleted successfully');
    }

    public function file_destroy($path)
    {
        $news = NEWS::find($path);
        File::delete($news->file);
        $news->file = '0';
        $news->save();
        return redirect()->back();
    }

    public function mark_online(Request $request)
    {
        $edition = Edition::where('id', $request->input('ID'))->first();
        $edition->online = '1';
        $edition->save();
        return redirect()->back()->with('success', 'Edition ' . $request->input('ID') . ' is online');
    }

    public function mark_offline(Request $request)
    {
        $edition = Edition::where('id', $request->input('ID'))->first();
        $edition->online = '0';
        $edition->save();
        return redirect()->back()->with('success', 'Edition ' . $request->input('ID') . ' is offline');
    }

    public function Englishchecked(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        $news->english_check = '1';
        $news->timestamps = false;
        $news->save();

        $this->saveToLog(self::NEWS, $news->id, 'English Content Checked');

        return redirect()->back()->with('success', 'News #' . $news->id . ' has been marked as English Checked.');
    }
    public function sendEmail(Request $request)
    {
        //list of mails
        $mails = $request->ids;
        foreach ($mails as $key => $mail) {
            // find token
            $sub = Subscriber::where('mail',$mail)->first();
            $unsubscribeToken = $sub->token;

            // Generate unsubscribe link
            $unsubscribeLink = route('unsubscribe.confirm', ['token' => $unsubscribeToken]);
            Mail::to($mail)->send(new UserEmail($unsubscribeLink));
        }
        return response()->json(['success' => 'Email Sent Successfully.']);
    }
    public function sendEmailAll()
    {
        $subscribers = Subscriber::all();
        $failedEmails = [];
        foreach ($subscribers as $key => $subscriber) {
            try {
                // Generate token
                $sub = Subscriber::where('mail', $subscriber->mail)->first();
                $unsubscribeToken = $sub->token;

                // Generate unsubscribe link
                $unsubscribeLink = route('unsubscribe.confirm', ['token' => $unsubscribeToken]);
                Mail::to($subscriber->mail)->send(new UserEmail($unsubscribeLink));
            }catch (\Exception $e) {
                $failedEmails[] = $subscriber->mail;
            }
        }
        return response()->json(['success' => 'Email Sent Successfully.' ,'failed' => $failedEmails,]);
    }

    public function unsubscribe($token)
    {
        $edition = Edition::all()->select('id')->last();
        $subscriber = $this->findByToken($token);

        if ($subscriber) {
            Subscriber::find($subscriber->id)->delete();
            return view('new.public.unsubscribe',['edition' => $edition]);
        }
//        Log::error('Subscriber not found by token: ' . $token);

        return response()->view('new.errors.404', [], 404);
    }
    public static function findByToken($token)
    {
        $sub = Subscriber::where('token', $token)->first();
        return $sub;
    }

    public function tag_store(Request $request)
    {
        $request->validate(['name' => 'required|unique:tags,name|max:50']);
        $tag = Tag::create(['name' => $request->name]);

        $this->saveToLog(self::TAGS, $tag->id, 'Tag Created: ' . $tag->name);

        return redirect()->route('news.index', ['tab' => 'Tags'])
            ->with('success', 'Tag created successfully');
    }

    public function tag_update(Request $request, $id)
    {
        $request->validate(['name' => 'required|max:50|unique:tags,name,'.$id]);
        $tag = Tag::findOrFail($id);
        $oldName = $tag->name;

        $tag->update(['name' => $request->name]);

        $this->saveToLogWithData(self::TAGS, $tag->id, 'Tag Updated', $oldName, $tag->name);

        return redirect()->route('news.index', ['tab' => 'Tags'])
            ->with('success', 'Tag updated successfully');
    }

    public function tag_destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tagName = $tag->name;

        $tag->news()->detach();
        $tag->delete();

        $this->saveToLog(self::TAGS, $id, 'Tag Deleted: ' . $tagName);

        return redirect()->route('news.index', ['tab' => 'Tags'])
            ->with('success', 'Tag deleted successfully');
    }
}
