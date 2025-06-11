<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HandleApiToken
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('token') && session()->has('user')) {
            $user = User::find(session('user')['id']);
            Auth::login($user);
        } elseif (Auth::check()) {
            Auth::logout();
            session()->forget(['token', 'user']);
            return redirect('/login');
        }

        return $next($request);
    }
} 