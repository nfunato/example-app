<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'todo' => 'required|max:100'
        ];
    }

    public function todo(): string
    {
        return $this->input('todo');
    }

    public function id(): int
    {
        return (int) $this->route('todoId');
    }

    public function deadline()
    {
        return $this->input('deadline');
    }

    /*
    public function edit()
    {
        return $this->input('edit');
    }
    */
}
