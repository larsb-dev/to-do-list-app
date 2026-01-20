<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()], // password_confirmation input field
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('todos.index');
    }
}
