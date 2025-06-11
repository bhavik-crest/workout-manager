<?php

namespace App\Livewire;

use App\Models\Workout;
use Livewire\Component;
use Livewire\WithPagination;

class WorkoutList extends Component
{
    use WithPagination;

    public $search = '';
    public $trainer = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $workoutToDelete = null;
    public $showDeleteModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'trainer' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function confirmDelete($id)
    {
        $this->workoutToDelete = $id;
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->workoutToDelete = null;
        $this->showDeleteModal = false;
    }

    public function deleteWorkout()
    {
        if ($this->workoutToDelete) {
            $workout = Workout::find($this->workoutToDelete);
            
            if ($workout && $workout->user_id === auth()->id()) {
                $workout->delete();
                session()->flash('message', 'Workout deleted successfully.');
            }
        }
        
        $this->workoutToDelete = null;
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $workouts = Workout::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->trainer, function ($query) {
                $query->where('trainer', 'like', '%' . $this->trainer . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.workout-list', [
            'workouts' => $workouts
        ])->layout('components.app-layout');
    }
} 