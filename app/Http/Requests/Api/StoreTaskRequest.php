<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;

class StoreTaskRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:1000',
            'status' => 'nullable|in:pending,in_progress,completed'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' =>  __('tasks.title.required'),
            'title.min' => __('tasks.title.min', ['min' => 3]),
            'title.max' => __('tasks.title.max', ['max' => 255]),
            'description.min' => __('tasks.description.min', ['min' => 3]),
            'description.max' => __('tasks.description.max', ['max' => 1000]),
            'status.in' => __('tasks.status.in'),
        ];
    }
}
