<?php

namespace App\Livewire\Partials;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $notes;

    #[On('noteSaved')] 
    public function noteSaved()
    {
        $this->notes = Note::all()->sortByDesc('starred');
    }
    
    #[On('searchUpdated')]
    public function filterData($searchTerm)
    {
        $this->notes = Note::where('title', 'like', '%' . $searchTerm . '%')->get();
    }

    public function mount()
    {
        $this->notes = Note::all()->sortByDesc('starred');
    }

    public function render()
    {
        return view('livewire.partials.navigation');
    }
}
