<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task' => 'required|max:255|min:8|unique:tasks,name'
        ];
    }
    public function messages()
    {
        return [
            'task.required' => 'The :attribute field is required.',
            'task.min' => 'The :attribute must be at least :min.',
            'task.unique' => 'The :attribute has already been taken.',
            'task.max' => 'The :attribute must be at least :max.',
        ];
    }
}

