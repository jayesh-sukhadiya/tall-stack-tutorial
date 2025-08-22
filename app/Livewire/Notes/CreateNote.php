<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CreateNote extends Component
{
    #[Rule('required|min:3|max:255')]
    public $title = '';

    #[Rule('required|min:10')]
    public $content = '';

    #[Rule('required|date')]
    public $note_date = '';

    #[Rule('required|in:low,medium,high')]
    public $priority = 'medium';

    public $showForm = false;

    public function mount()
    {
        $this->note_date = now()->format('Y-m-d');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        if (!$this->showForm) {
            $this->resetForm();
        }
    }

    public function resetForm()
    {
        $this->reset(['title', 'content', 'priority']);
        $this->note_date = now()->format('Y-m-d');
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        Note::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
            'note_date' => $this->note_date,
            'priority' => $this->priority,
        ]);

        $this->resetForm();
        $this->showForm = false;

        $this->dispatch('note-created');
        session()->flash('message', 'Note created successfully!');
    }

    public function render()
    {
        return view('livewire.notes.create-note');
    }
}
