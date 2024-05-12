<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {

        // Validate user data
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Exclude current user's email
            'password' => 'nullable|string|min:8', // Allow password update to be optional
        ]);

        // Update user details
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'admin' => request('admin')
        ]);


        return redirect('/users/' .  $user->id )->with('success', 'User edited successfully!');
    }

    public function stats(User $user)
    {
        $todo = Todo::with('user')
        ->where('user_id', $user->id);

        $todo_all_count = $todo->count();

        $todo_done_count = $todo->where('done', true)->count();

        $todo_not_done_count = $todo_all_count - $todo_done_count;




        return view('users.stats', [
            'todo' => $todo,
            'todo_all_count' => $todo_all_count,
            'todo_done_count' => $todo_done_count,
            'todo_not_done_count' => $todo_not_done_count,
            'todo_done_percent' => round(($todo_done_count / $todo_all_count) * 100),

        ]);


    }
}
