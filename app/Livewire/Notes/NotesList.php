<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class NotesList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedDate = '';
    public $priorityFilter = '';
    public $showArchived = false;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedDate' => ['except' => ''],
        'priorityFilter' => ['except' => ''],
        'showArchived' => ['except' => false],
    ];

    public function mount()
    {
        $this->selectedDate = now()->format('Y-m-d');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedDate()
    {
        $this->resetPage();
    }

    public function updatedPriorityFilter()
    {
        $this->resetPage();
    }

    public function updatedShowArchived()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function toggleArchive($noteId)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($noteId);
        $note->update(['is_archived' => !$note->is_archived]);
        
        $this->dispatch('note-updated');
    }

    public function deleteNote($noteId)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($noteId);
        $note->delete();
        
        $this->dispatch('note-deleted');
    }

    #[On('note-created')]
    #[On('note-updated')]
    #[On('note-deleted')]
    public function refreshNotes()
    {
        // This method will be called when notes are created, updated, or deleted
        // The component will automatically re-render
    }

    public function render()
    {
        $query = Note::where('user_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedDate, function ($query) {
                $query->where('note_date', $this->selectedDate);
            })
            ->when($this->priorityFilter, function ($query) {
                $query->where('priority', $this->priorityFilter);
            })
            ->when(!$this->showArchived, function ($query) {
                $query->where('is_archived', false);
            })
            ->when($this->showArchived, function ($query) {
                $query->where('is_archived', true);
            });

        $notes = $query->orderBy($this->sortBy, $this->sortDirection)
                      ->paginate(10);

        return view('livewire.notes.notes-list', [
            'notes' => $notes,
            'priorities' => ['low', 'medium', 'high'],
        ]);
    }
}
