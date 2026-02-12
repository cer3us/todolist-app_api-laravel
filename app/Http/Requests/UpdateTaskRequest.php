<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|min:3|max:255',
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
