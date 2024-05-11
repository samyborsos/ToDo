<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())
            ->with('user')
            ->latest('deadline')
            ->simplePaginate(10);

        return view('todos.index', [
            'todos' => $todos,
        ]);
    }
    public function show(Todo $todo)
    {
        return view('todos.show', [
            'todo' => $todo,
        ]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],

        ]);


        Todo::create([
            'user_id' => Auth::user()->id,
            'title' => request('title'),
            'deadline' => request('deadline'),
            'category' => request('category'),
            'done' => false,
        ]);

        return redirect('/todos')->with('success', 'todo created successfully!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', [
            'todo' => $todo
        ]);
    }

    public function update(Todo $todo)
    {
        $validated = request()->validate([
            'title' => ['required'],
            'deadline' => ['required','date'],
            'done' => ['required'],
            'category' => ['required'],
        ]);

       /*  $validated['author_id'] = Auth::user()->id;
        $validated['image_url'] = request('image_url')->store('images', 'public'); // Store in public/images

        Storage::disk('public')->delete($todo->image_url);

        $todo->update($validated); */

        if($validated['done'] === true) {
            $validated['done_at'] = time();
        }

        $todo->update($validated);

        return redirect('/todos/' .  $todo->id)->with('success', 'todo edited successfully!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/todos');
    }

    public function search()
    {
        $search = request('term');
        //$todos = todo::search(request('term'))->paginate(15);
        $todos = Todo::query()
            ->with('user')
            ->where('user_id', Auth::id())
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->latest('deadline')
            ->paginate(10);

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function filterCategory()
    {

        $todos = Todo::orderBy('category', 'desc')
        ->with('user')
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function filterTitle()
    {

        $todos = Todo::orderBy('title', 'asc')
        ->with('user')
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function filterDeadline()
    {

        $todos = Todo::orderBy('deadline', 'desc')
        ->with('user')
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

        return view('todos.index', [
            'todos' => $todos
        ]);
    }
}

