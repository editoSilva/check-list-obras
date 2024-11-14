<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'     => 'required|max:5|unique:categories',
            'status'   => 'required|boolean'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'Você precisa digitar algo!',
            'name.max'          => 'Digite no máximo 5 Letras!',
            'name.unique'       => 'Nome ja cadastrado no sistema!',
            'status.required'   => 'O status é requirido!',
            'status.boolean'    => 'O status precisa ser boleano!'


        ];
    }
}
