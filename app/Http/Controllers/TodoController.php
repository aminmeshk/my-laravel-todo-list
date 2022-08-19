<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkTodoAsDoneRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // @supress-intelephense
        return view('dashboard', ['todos' => auth()->user()->todos()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $formFields = $request->validated();

        $formFields['user_id'] = auth()->id();

        Todo::create($formFields);

        return redirect()->route('dashboard')->with('result', [
            'message' => 'To-Do item added successfully',
            'type' => 'success',
            'slug' => 'todo-added'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        if (auth()->user()->id != $todo->user_id) {
            return abort(403);
        }

        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        if (auth()->user()->id != $todo->user_id) {
            return abort(403);
        }

        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $formFields = $request->validated();

        $todo->update($formFields);

        return redirect()->route('todo.show', ['todo' => $todo->id])->with('result', [
            'message' => 'To-Do item updated successfully!',
            'type' => 'success',
            'slug' => 'todo-updated'
        ]);
    }

    /**
     * Mark to-do item as Done
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function done(MarkTodoAsDoneRequest $request, Todo $todo)
    {
        $formFields = $request->validated();

        $formFields['done_at'] = $formFields['done'] == "1" ? Carbon::now() : null;

        $todo->update($formFields);

        return redirect()->route('todo.show', ['todo' => $todo->id])->with('result', [
            'message' => 'Yay! Your To-Do item has been mark as done successfully!',
            'type' => 'success',
            'slug' => 'todo-done'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('dashboard')->with('result', [
            'message' => 'To-Do item deleted successfully!',
            'type' => 'success',
            'slug' => 'todo-deleted'
        ]);
    }
}
