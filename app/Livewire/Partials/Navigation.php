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
        $this->notes = Note::all();
    }

    public function deleteNote($id)
    {
        $note = Note::find($id);

        // $note->delete();
        
        // $this->notes = Note::all();

        if (request()->routeIs('note') && request()->route('id') == $id) {
            dd('true');
            return redirect()->route('home');
        }
    }

    public function mount()
    {
        $this->notes = Note::all();
    }

    public function render()
    {
        return view('livewire.partials.navigation', [
            'notes' => $this->notes,
        ]);
    }
}
