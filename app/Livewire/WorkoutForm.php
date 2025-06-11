<?php

namespace App\Livewire;

use App\Models\Workout;
use Livewire\Component;

class WorkoutForm extends Component
{
    public ?Workout $workout = null;
    public string $title = '';
    public string $description = '';
    public string $trainer = '';
    public bool $is_active = true;
    public string $date = '';
    public int $slots = 1;
    public bool $isEdit = false;

    protected $messages = [
        'title.required' => 'The workout title is required.',
        'title.min' => 'The title must be at least 3 characters.',
        'description.required' => 'Please provide a workout description.',
        'description.min' => 'The description must be at least 10 characters.',
        'trainer.required' => 'Please specify a trainer name.',
        'trainer.min' => 'The trainer name must be at least 3 characters.',
        'date.required' => 'Please select a date and time.',
        'date.date' => 'Please provide a valid date and time.',
        'date.after' => 'The workout must be scheduled for a future date.',
        'slots.required' => 'Please specify the number of available slots.',
        'slots.integer' => 'The slots must be a whole number.',
        'slots.min' => 'There must be at least 1 slot available.',
    ];

    protected function rules()
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'trainer' => 'required|min:3',
            'is_active' => 'boolean',
            'date' => 'required|date|after:now',
            'slots' => 'required|integer|min:1'
        ];
    }

    public function mount(?Workout $workout = null)
    {
        if ($workout && $workout->exists) {
            $this->workout = $workout;
            $this->title = $workout->title;
            $this->description = $workout->description;
            $this->trainer = $workout->trainer;
            $this->is_active = $workout->is_active;
            $this->date = $workout->date->format('Y-m-d\TH:i');
            $this->slots = $workout->slots;
            $this->isEdit = true;
        } else {
            $this->date = now()->addHour()->format('Y-m-d\TH:i');
            $this->isEdit = false;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->isEdit && $this->workout) {
            $this->workout->update($validatedData);
            session()->flash('message', 'Workout updated successfully.');
        } else {
            $validatedData['user_id'] = auth()->id();
            Workout::create($validatedData);
            session()->flash('message', 'Workout created successfully.');
        }

        return redirect()->route('workouts');
    }

    public function render()
    {
        return view('livewire.workout-form');
    }
} 