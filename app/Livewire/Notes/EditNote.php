<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class EditNote extends Component
{
    public Note $note;

    #[Rule('required|min:3|max:255')]
    public $title = '';

    #[Rule('required|min:10')]
    public $content = '';

    #[Rule('required|date')]
    public $note_date = '';

    #[Rule('required|in:low,medium,high')]
    public $priority = 'medium';

    public $showForm = false;

    public function mount($noteId)
    {
        $this->note = Note::where('user_id', Auth::id())->findOrFail($noteId);
        $this->title = $this->note->title;
        $this->content = $this->note->content;
        $this->note_date = $this->note->note_date->format('Y-m-d');
        $this->priority = $this->note->priority;
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function save()
    {
        $this->validate();

        $this->note->update([
            'title' => $this->title,
            'content' => $this->content,
            'note_date' => $this->note_date,
            'priority' => $this->priority,
        ]);

        $this->showForm = false;

        $this->dispatch('note-updated');
        session()->flash('message', 'Note updated successfully!');
    }

    public function cancel()
    {
        $this->title = $this->note->title;
        $this->content = $this->note->content;
        $this->note_date = $this->note->note_date->format('Y-m-d');
        $this->priority = $this->note->priority;
        $this->showForm = false;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.notes.edit-note');
    }
}
