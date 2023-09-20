<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServidorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'required',
            'nome' => 'required',
            'matricula' => 'required',
            'cargo' => 'required',
            'Subcargo' => 'required',
            'email' => 'required|email|unique:servidores',
            'telefone' => 'required',
            'endereco' => 'required',
        ];
    }
}
