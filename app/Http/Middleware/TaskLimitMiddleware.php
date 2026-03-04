<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TaskLimitMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = Session::getId();
        $taskCount = Task::where('session_id', $sessionId)->count();

        if ($taskCount >= 5) {
            // API request → return JSON error
            if ($request->expectsJson()) {
                return response()->json([
                    'processing_status' => 'error',
                    'message' => __('tasks.limitReached')
                ], 429); // Too Many Requests
            }

            // Web request → redirect back with flash message
            return redirect()->back()->with('error', __('tasks.limitReached'));
        }

        return $next($request);
    }
}
