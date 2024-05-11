<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'name'          => ['required'],
            'email'         => ['required', 'email'],
            'password'      => ['required', Password::min(6), 'confirmed'], // laravel/docs/validation
            'admin'         => ['required']
        ]);

        // create that user
        //dd($validatedAttributes);
        $user = User::create($validatedAttributes);

        // log in
        Auth::login($user);

        // redirect to dashboard
        return redirect('/blogs');
    }
}
