<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){

        return [

            'nick' => 'required|max:20',
            'nombre' => 'required|regex:/^[a-zA-Z ]+$/|max:20',
            'apellidos' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.+[a-z])(?=.+[A-Z])(?=.+\d)(?=.+\W)[a-zA-Z\d\W]+$/|min:6',
            'imagen' => 'required'

        ];

    }

    public function messages(){

        return[

            'nick.required' => 'Debe introducir un Nick para registrar al usuario',
            'nick.max' => 'El Nick no puede tener más de 20 caracteres',
            'nombre.required' => 'Indique un Nombre',
            'nombre.regex' => 'Un Nombre no puede contener números o símbolos',
            'nombre.max' => 'El Nombre no puede tener más de 20 caracteres',
            'apellidos.required' => 'Indique los Apellidos',
            'apellidos.regex' => 'Los Apellidos no puede contener números o símbolos',
            'apellidos.max' => 'Los Apellidos no puede tener más de 50 caracteres',
            'email.required' => 'Debe introducir un Email para registrar al usuario',
            'email.email' => 'Un Email debe contar con el formato habitual establecido',
            'password.required' => 'Debe introducir una Contraseña para registrar al usuario',
            'password.regex' => 'La Contraseña debe ser muy segura: debe contener mayúsculas y minúsculas, símbolos y números',
            'password.min' => 'La Contraseña debe tener 6 o más caracteres',
            'imagen.required' => 'Incluya una Imagen de su gusto'

        ];

    }

}
