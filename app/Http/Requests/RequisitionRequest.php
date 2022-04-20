<?php

namespace Smapac\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class  RequisitionRequest extends FormRequest
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
        $date = Carbon::yesterday();
        return [
            'folio'         =>      'required|unique:requisitions,folio',
            'management'    =>      'required',
            'added_on'      =>      'required|date|after_or_equal:'.$date,
            'required_on'   =>      'required|date|after_or_equal:'.$date,
            'administrative_unit' => 'required',
            'issue'         =>      'required|min:20',
            'remark'        =>      'required|min:30',

            'departure'     =>      'required|min:1',
            'quantity'      =>      'required|min:1',
            'unit'          =>      'required|min:1',
            'concept'       =>      'required|min:1',

        ];
    }

    public function attributes()
    {
        return [
            'folio'         =>      'Folio de la requisición',
            'management'    =>      'Nombre de la Direccion',
            'added_on'      =>      'Fecha de la solicitud',
            'required_on'   =>      'Fecha para requerir',
            'administrative_unit' =>    'Unidad administrativa',
            'issue'         =>      'Asunto de la requisición',
            'remark'        =>      'Observación de la requsición',

            'departure'     =>      'Partida de la lista',
            'quantity'      =>      'Cantiad de productos o servicios',
            'unit'          =>      'Unidad de los productos o servicios',
            'concept'       =>      'Concepto de los productos'
        ];
    }

    public function messages()
    {
        return [
            'folio.required'        =>      'El :attribute es obligatorio.',
            'folio.unique'        =>      'Este :attribute ya ha sido registrado.',
            'management.required'   =>      'Ingresa un :attribute',
            'added_on.required'     =>      'Ingresa el :attribute',
            'added_on.date'         =>      'La :attribute no cumple con el formato',
            'added_on.after_or_equal' =>    'La :attribute no debe ser menor a hoy',
            'required_on.required'    =>    'Ingresa un :attribute.',
            'required_on.date'         =>      'La :attribute no cumple con el formato',
            'required_on.after_or_equal' =>    'La :attribute no debe ser menor a hoy',
            'administrative_unit.required' => 'Ingresa :attribute',

            // 'departure[].required' => 'Ingresa la partida',
            // 'quantity[].required' => 'Ingresa la cantidad',
            // 'unit[].required' => 'Ingresa la unidad',
            // 'concept[].required' => 'Ingresa el concepto'
        ];

    }
}
