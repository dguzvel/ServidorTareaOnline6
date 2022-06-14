<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarActuRequest extends FormRequest
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
    public function rules(){

        return [

            'nombre' => 'required|regex:/^[a-zA-Z ]+$/|max:20',
            'apellidos' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'email' => 'required|email',
            'imagen' => 'required'

        ];

    }

    public function messages(){

        return[

            'nombre.required' => 'Indique un Nombre',
            'nombre.regex' => 'Un Nombre no puede contener números o símbolos',
            'nombre.max' => 'El Nombre no puede tener más de 20 caracteres',
            'apellidos.required' => 'Indique los Apellidos',
            'apellidos.regex' => 'Los Apellidos no puede contener números o símbolos',
            'apellidos.max' => 'Los Apellidos no puede tener más de 50 caracteres',
            'email.required' => 'Debe introducir un Email para registrar al usuario',
            'email.email' => 'Un Email debe contar con el formato habitual establecido',
            'imagen.required' => 'Incluya una Imagen de su gusto'

        ];

    }

}
