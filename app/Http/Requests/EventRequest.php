<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'date' => 'required|date',
            'time' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Por favor, dê um título para seu evento.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'date.required' => 'Seu evento precisa de uma data.',
            'time.required' => 'Seu evento precisa de um horário.',
        ];
    }
}
