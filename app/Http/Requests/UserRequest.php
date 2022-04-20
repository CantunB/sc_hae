<?php

namespace Smapac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'NoEmpleado' => 'required|unique:users,NoEmpleado,'.$this->route('usuario'),
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'email|unique:users,email,'.$this->route('usuario'),
            //'paterno' => 'required|regex:/^[\pL\s\-]+$/u',
            // 'materno' => 'required|regex:/^[\pL\s\-]+$/u',
            //'no_seg_soc' => 'required',
            //'curp' => 'required',
            //'rfc' => 'required',
            // 'phone' => 'required|digits:10',
            // 'birthday' => 'required',
            // 'gender' => 'required',
            // 'age' => 'required|numeric',
            // 'profession' => 'required',
            // 'email' => 'required|email|unique:users,email',
            // 'address' => 'required',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'NoEmpleado.required' => 'Ingresa el numero de empleado.',
            'NoEmpleado.unique' => 'El numero de empleado ya existe',
            'name.required' => 'Ingresa el nombre del empleado.',
            'name.regex' => 'El campo nombre no admite valores numericos.',
            'email.unique' => 'El  correo ingresado ya existe.',
            //'paterno.required' => 'Ingresa el apellido del empleado.',
           // 'paterno.regex' => 'El campo apellido no admite valores numericos.',
            //'curp.required' => 'Ingresa la curp del empleado',
            //'rfc.required' => 'Ingresa el rfc del empleado',
            // 'materno.required' => 'El campo apellido materno es obligatorio.',
            // 'materno.regex' => 'El campo apellido materno no admite valores numericos.',
            // 'phone.digits' => 'El campo teléfono debe tener 10 dígitos.',
            // 'age.numeric' => 'El campo teléfono debe ser numerico.',
            // 'birthday.required' => 'El campo fecha de nacimiento es obligatorio.',
            // 'profession.required' => 'El campo profesion es obligatorio.',
            // 'email.required' => 'El campo correo es obligatorio.'
            'roles.required' => 'Selecciona un rol para el empleado'
        ];

    }
}
