<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    // GET /tasks - Просмотр списка задач

    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'status' => 'success',
            'data' => $tasks
        ], Response::HTTP_OK);
    }


    // POST /tasks - Создание задачи

    public function store(Request $request)
    {
        // Валидация
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:1000',
            'status' => 'nullable|in:pending,in_progress,completed'
        ]);

        // Создание задачи
        $task = Task::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully',
            'data' => $task
        ], Response::HTTP_CREATED);
    }

    // GET /tasks/{id} - Просмотр одной задачи

    public function show($id)
    {
        // Поиска задачи по `id`
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'data' => $task
        ], Response::HTTP_OK);
    }

    // PUT /tasks/{id} - Обновление задачи

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }

        // Валидация
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:1000',
            'status' => 'nullable|in:pending,in_progress,completed'
        ]);

        // Обновление задачи
        $task->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Task updated successfully',
            'data' => $task
        ], Response::HTTP_OK);
    }

    // DELETE /tasks/{id} - Удаление задачи

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }

        // Удаление задачи
        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully'
        ], Response::HTTP_OK);
    }
}
