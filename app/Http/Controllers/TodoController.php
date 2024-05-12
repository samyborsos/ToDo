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

    public function search(Request $request)
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

    public function filter(Request $request)
    {
        $sortBy = $request->get('sort_by', 'created_at'); // Default sort by created_at
        //dd($request->get('sort_order'));
        //$sortOrder = $request->get('sort_order', 'desc');
        $sortOrder = $request->get('sort_order');
        $filter = $request->get('filter'); // New filter parameter

        $query = Todo::query()
            ->with('user')
            ->where('user_id', Auth::id());

        if ($sortOrder) {
            switch ($sortOrder) {
                case 'asc':
                    $query->orderBy($sortBy, 'asc');
                    break;
                case 'desc':
                    $query->orderBy($sortBy, 'desc');
                    break;
            }
        }

        if ($filter) {
            switch ($filter) {
                case 'category':
                    $query->orderBy('category', $sortOrder);
                    break;
                case 'title':
                    $query->orderBy('title', $sortOrder);
                    break;
                case 'deadline':
                    $query->orderBy('deadline', $sortOrder);
                    break;
            }
        }



        $todos = $query->latest()->paginate(10);

        return view('todos.index', [
            'todos' => $todos,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'filter' => $filter
        ]);
    }

}

