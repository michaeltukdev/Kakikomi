<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Note as NoteModel;

class Note extends Component
{
    public $note;
    public $noteID;
    public $title;
    public $content;
    public $locked;

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function delete()
    {
        $this->note->delete();

        return redirect('home');
    }

    public function lock()
    {
        $this->note->locked = !$this->note->locked;
        $this->note->save();

        $this->locked = $this->note->locked;
    }

    public function save()
    {
        $this->validate();

        $this->note->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->dispatch('noteSaved');
    }

    public function mount($id = null)
    {
        
        if ($id) {
            $this->note = NoteModel::find($id);
            $this->title = $this->note->title;
            $this->content = $this->note->content;
            $this->locked = $this->note->locked;
        } else {
            $note = NoteModel::create([
                'title' => 'New note',
                'content' => 'Start your wildest dreams...',
            ]);

            return $this->redirectRoute('note', $note->id);
        }
    }

    public function render()
    {
        return view('livewire.note')
            ->layout('layouts.app');
    }
}
