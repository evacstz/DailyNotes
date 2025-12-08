<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChecklistRequest extends FormRequest
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
            'items' => 'required|array|min:1',
            'items.*' => 'required|string|distinct',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Por favor, dê um título para sua lista.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'items.required' => 'Sua lista precisa ter itens.',
            'items.min' => 'Por favor, adicione pelo menos um item à sua lista.',
        ];
    }
}
