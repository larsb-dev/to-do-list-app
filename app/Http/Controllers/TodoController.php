<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
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
        $todos = Todo::with('status')->select(['id', 'title', 'description', 'status_id']);

        if ($request->status) {
            $statusId = Status::getIdFromName($request->status);
            $todos->where('status_id', $statusId);
        }

        $todos = $todos->where('user_id', $request->user()->id)->simplePaginate(9)->withQueryString();

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
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $request->user()->todos()->create($request->validated());

        return redirect()->route('todos.index')->with('status', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

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

    /**
     * Mark the status of the specified resource as complete.
     */
    public function complete(Todo $todo)
    {
        $todo->update(
            ['status_id' => 3]
        );

        return redirect()->route('todos.index');
    }
}
