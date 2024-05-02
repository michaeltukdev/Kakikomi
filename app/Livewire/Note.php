<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Note as NoteModel;
use Illuminate\Support\Facades\Crypt;

class Note extends Component
{
    public $note;
    public $noteID;
    public $title;
    public $content;
    public $locked;
    public $starred;
    public $viewingPassword;
    public String $password;
    public String $password_confirmation;
    public bool $revealed = true;

    public function encryptNote()
    {
        $this->validate([
            'password' => 'required|confirmed',
        ]);

        $title = Crypt::encrypt($this->title);
        $content = Crypt::encrypt($this->content);
        $hashedPassword = $this->password;

        $this->note->password = $hashedPassword;
        $this->note->title = $title;
        $this->note->content = $content;
        $this->note->save();

        $this->redirect(route('note', $this->note->id));
    }

    public function verifyPassword()
    {
        if (password_verify($this->viewingPassword, $this->note->password)) {
            $this->revealed = true;
            $this->title = Crypt::decrypt($this->note->title);
            $this->content = Crypt::decrypt($this->note->content);
        }
    }

    public function delete()
    {
        $this->note->delete();

        return redirect(route('home'));
    }

    public function lock()
    {
        $this->note->locked = !$this->note->locked;
        $this->note->save();

        $this->locked = $this->note->locked;
    }

    public function star()
    {
        $this->note->starred = !$this->note->starred;
        $this->note->save();

        $this->starred = $this->note->starred;

        $this->dispatch('noteSaved');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->note->title = $this->note->password ? Crypt::encrypt($this->title) : $this->title;
        $this->note->content = $this->note->password ? Crypt::encrypt($this->content) : $this->content;
        $this->note->save();

        $this->dispatch('noteSaved');
    }

    public function mount($id = null)
    {
        
        if ($id) {
            $this->note = NoteModel::find($id);

            if(!$this->note) {
                return $this->redirectRoute('home');
            }

            $this->setNoteContent();
        } else {
            $note = NoteModel::create([
                'title' => 'New note',
                'content' => 'Start your wildest dreams...',
            ]);

            return $this->redirectRoute('note', $note->id);
        }
    }

    public function setNoteContent() : void
    {
        $this->title = $this->note->title;
        $this->content = $this->note->content;
        $this->locked = $this->note->locked;
        $this->starred = $this->note->starred;

        if ($this->note->password) {
            $this->revealed = false;
        }
    }

    public function render()
    {
        return view('livewire.note')
            ->layout('layouts.app');
    }
}
