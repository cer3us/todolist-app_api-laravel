<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;

class UpdateTaskRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'title' => 'string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:1000',
            'status' => 'nullable|in:pending,in_progress,completed'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.min' => 'Название должно содержать не менее :min символов.',
            'title.max' => 'Название должно содержать не более :max символов.',
            'description.min' => 'Описание должно содержать не менее :min символов.',
            'description.max' => 'Описание должно содержать не более :max символов.',
            'status.in' => 'Выбран недопустимый статус.',
        ];
    }
}
