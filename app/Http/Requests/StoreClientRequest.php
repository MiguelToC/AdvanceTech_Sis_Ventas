<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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

            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients|min:8|max:8',
            'ruc'=>'nullable|string|unique:clients|min:11|max:11',
            'address'=>'nullable|string|max:255',
            'phone'=>'string|nullable|unique:clients|min:9|max:9',
            'email'=>'string|nullable|unique:clients|max:255|email:rfc,dns',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'dni.string' => 'El valor no es correcto.',
            'dni.required' => 'Este campo es requerido.',
            'dni.unique'=>'Este DNI ya se encuentra registrado.',
            'dni.min' => 'Se requiere de 8 caracteres.',
            'dni.max'=>'Solo se permite 8 caracteres.',

            'ruc.string' => 'El valor no es correcto.',
            'ruc.unique'=>'Este DNI ya se encuentra registrado.',
            'ruc.min'=>'Se requiere de 11 caracteres.',
            'ruc.max'=>'Solo se permite 11 caracteres.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se perimte 255 caracteres.',


            'phone.string'=>'El valor no es correcto.',
            'phone.unique'=>'El numero de celular ya se encuentra registrado',
            'phone.min'=>'Se requiere de 9 caracteres.',
            'phone.max'=>'Solo se permite 9 caracteres.',

            'email.string'=>'El valor no es correcto.',            
            'email.unique'=>'El correo ya se encuentra registrado.',
            'email.max'=>'Solo se permite 255 caracteres.',
            'email.email'=>'No es un correo electronico.',


        ];
    }
}
