<?php

namespace Smapac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:departments,slug,',$this->route('departamentos'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingresa un nombre de permiso.',
            'slug.required' => 'Ingresa el slug del permiso con la forma "example.accion".',
            'slug.unique' => 'El slug ya esta asignado a otro departamento".',
        ];

    }
}
