<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'          => 'required',
            'description'   => 'required|min:30|max:200',
            'body'          => 'required',
            'price'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'min'       => 'Este campo deve ter no mínimo :min caracteres',
            'max'       => 'Este campo deve ter no maximo :max caracteres',
            'required'  => 'Este campo é obrigatório'
        ];
    }
}
