<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        N+1 problem, not eager loaded
//        $todos = Todo::select(['id', 'title', 'description', 'status_id']);

        $todos = Todo::with('status')->select(['id', 'title', 'description', 'status_id']);

        if ($request->status) {
            $statusId = Status::where('name', $request->status)->value('id');
            $todos->where('status_id', $statusId);
        }

        $todos = $todos->simplePaginate(9);

        return view('todos.index', [
            'title' => 'Todos Index',
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create', [
            'title' => 'Add'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required|max:80',
            'description' => 'required|max:255',
            'status_id' => 'required',
        ]);

        Todo::create($validated);

        return redirect()->route('todos.index')->with('status', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return redirect()->route('todos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', [
            'title' => 'Todos Edit',
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Route model binding instead of $request and $id
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|max:80',
            'description' => 'required|max:255',
            'status_id' => 'required',
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
