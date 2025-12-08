<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReminderRequest extends FormRequest
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
            'text' => 'required|string|max:255',
            'time' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Seu lembrete não pode ficar vazio.',
            'text.max' => 'O lembrete não pode ter mais de 255 caracteres.',
        ];
    }
}
