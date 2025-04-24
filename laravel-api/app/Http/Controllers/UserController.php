<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $incomingERequest = $request->validate([
            'name' => ['required', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $incomingERequest['password'] = bcrypt($incomingERequest['password']);

        // Create user and login
        $user = User::create($incomingERequest);
        auth('web')->login($user);

        return redirect('/');
    }
}
