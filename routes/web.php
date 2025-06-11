<?php

use App\Livewire\WorkoutList;
use App\Livewire\WorkoutForm;
use App\Livewire\TestComponent;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Models\Workout;

Route::view('/', 'welcome');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/test', TestComponent::class)->name('test');
    
    // Workout routes
    Route::get('/workouts', WorkoutList::class)->name('workouts');
    Route::get('/workouts/create', function() {
        return view('workouts.create');
    })->name('workouts.create');
    Route::get('/workouts/{workout}/edit', function(Workout $workout) {
        return view('workouts.edit', ['workout' => $workout]);
    })->name('workouts.edit');

    Route::post('/logout', function () {
        auth()->logout();
        session()->forget(['token', 'user']);
        return redirect('/');
    })->name('logout');
});
