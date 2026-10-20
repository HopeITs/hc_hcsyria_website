<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.compress')]
#[Title('Compress Files')]
class Compress extends Component
{
    public string $tab = 'images';

    public bool $flatten = false;

    public int $preset = 1;

    public string $format = 'image/webp';

    public function render()
    {
        return view('livewire.compress');
    }
}
