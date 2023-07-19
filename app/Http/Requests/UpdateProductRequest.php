<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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

            'name' => 'string|required|unique:products,name,'.$this->route('product')->id.'|max:255',
            
            'sell_price' => 'required',
            'category_id' => 'integer|required|exists:App\Models\User,id',
            'provider_id' => 'integer|required|exists:App\Models\Category,id',

        ];
    }
    public function messages(){
        return[
            'name.string' => 'El valor no es correcto.',
            'name.required' => 'El campo es requerido.',
            'name.unique' => 'El producto ya está registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',

            

            'sell_price.required' => 'El campo es requerido.',

            'category_id.integer' => 'El valor tiene que ser entero.',
            'category_id.required' => 'El campo es requerido.',
            'category_id.exists' => 'La categoria no existe.',

            'provider id.Integer' =>'El valor tiene que ser entero.',
            'provider_id.required' => 'El campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.',

        ];
    }
}
