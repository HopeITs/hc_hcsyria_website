<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class TagsInput extends Component
{
    #[Modelable]
    public $value = '';

    public $name = 'tags';

    public $placeholder = 'Add tag';
    public $suggestions = '';
    public $forceSuggestion = false;

    public function render()
    {
        return view('livewire.forms.tags-input');
    }
}
