<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'text'=> 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Por favor, dê um título para sua nota.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'text.required' => 'A nota não pode ficar vazia.',
        ];
    }
}
