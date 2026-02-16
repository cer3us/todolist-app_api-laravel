<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Response;
use App\Http\Requests\Api\StoreTaskRequest;
use App\Http\Requests\Api\UpdateTaskRequest;
use App\Http\Resources\TaskResource;


class TaskController extends Controller
{
    public function index()
    {
        return response()->json([
            'processing_status' => 'success',
            'message' => 'All tasks retrieved successfully',
            'data' => TaskResource::collection(Task::all())
        ], Response::HTTP_OK);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());


        return (new TaskResource($task))->additional([
            'processing_status' => 'success',
            'message' => 'Task created successfully'
        ])->response()->setStatusCode(201);
    }


    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'processing_status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return (new TaskResource($task))->additional([
            'processing_status' => 'success',
            'message' => "Task retrieved successfully"
        ])->response()->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'processing_status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }


        $task->update($request->validated());

        return (new TaskResource($task))->additional([
            'processing_status' => 'success',
            'message' => 'Task updated successfully'
        ])->response()->setStatusCode(Response::HTTP_OK);
    }


    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'processing_status' => 'error',
                'message' => 'Task not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $task->delete();

        return (new TaskResource($task))->additional([
            'processing_status' => 'success',
            'message' => 'Task deleted successfully'
        ])->response()->setStatusCode(Response::HTTP_OK);
    }
}
