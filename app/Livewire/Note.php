<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Note as NoteModel;
use Illuminate\Support\Facades\Crypt;
use League\CommonMark\Node\Inline\Text;

class Note extends Component
{
    public NoteModel $note;
    public int $noteID;
    public String $title;
    public string $content;
    public bool $locked;
    public bool $starred;
    public String $viewingPassword;
    public String $password;
    public String $password_confirmation;
    public bool $revealed = true;

    public function encryptNote()
    {
        $this->validate([
            'password' => 'required|confirmed',
        ]);
    
        $this->note->title = Crypt::encrypt($this->title);
        $this->note->content = Crypt::encrypt($this->content);
        $this->note->password = $this->password;
    
        $this->note->save();
        return $this->redirectRoute('note', ['id' => $this->note->id]);
    }
    
    public function verifyPassword()
    {
        if (!password_verify($this->viewingPassword, $this->note->password)) {
            $this->addError('viewingPassword', 'The provided password is incorrect.');
            return;
        }
    
        $this->revealed = true;
        $this->title = Crypt::decrypt($this->note->title);
        $this->content = Crypt::decrypt($this->note->content);
    }    

    public function delete()
    {
        $this->note->delete();
        return $this->redirectRoute('home');
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

    public function mount(int $id = null)
    {
        if ($id) {
            $this->note = NoteModel::findOrFail($id);
            $this->setNoteContent();
        } else {
            $note = NoteModel::create([
                'title' => 'New note',
                'content' => 'Start your wildest dreams...',
            ]);
    
            return $this->redirectRoute('note', ['id' => $note->id]);
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
        return view('livewire.note');
    }
}
