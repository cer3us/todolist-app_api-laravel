<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;


class TaskWebController extends Controller
{
    public function index(): View
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {

        Task::create($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {

        $task->update($request->validated());

        return redirect()->route('tasks.show', $task->id)
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
