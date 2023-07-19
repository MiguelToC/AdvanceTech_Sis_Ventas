<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'string|required|unique:products|max:255',
            
            'sell_price' => 'required',
            

        ];
    }
    public function messages(){
        return[
            'name.string' => 'El valor no es correcto.',
            'name.required' => 'El campo es requerido.',
            'name.unique' => 'El producto ya está registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',

            

            'sell_price.required' => 'El campo es requerido.',

            

        ];
    }
}
