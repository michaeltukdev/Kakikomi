<?php

namespace App\Livewire;

use Livewire\Component;

class CreateNote extends Component
{
    public $title = '';
    public $content = '';

    public function render()
    {
        return view('livewire.create-note')
            ->layout('layouts.app');
    }
}
