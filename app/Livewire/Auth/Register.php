<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $error = null;
    public $showErrors = false;

    public function updated($propertyName)
    {
        if ($this->showErrors) {
            $this->validateOnly($propertyName);
        }
    }

    protected $rules = [
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirmation' => 'required|same:password'
    ];

    protected $messages = [
        'name.required' => 'Name field is required',
        'name.min' => 'Name must be at least 3 characters',
        'name.max' => 'Name cannot be longer than 50 characters',
        
        'email.required' => 'Email field is required',
        'email.email' => 'Please enter a valid email address',
        'email.unique' => 'This email is already registered',
        
        'password.required' => 'Password field is required',
        
        'password_confirmation.required' => 'Password confirmation is required',
        'password_confirmation.same' => 'Passwords do not match'
    ];

    public function register()
    {
        $this->showErrors = true;
        
        $validatedData = $this->validate();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        
        session()->regenerate();
        
        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.app-layout');
    }
} 