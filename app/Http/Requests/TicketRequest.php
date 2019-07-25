<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email',
            'company' => 'required|max:100',
            'cellphone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
            'address4' => 'required',
            'sapnumber' => 'max:100',
            'identification' => 'required|max:50',
            'sell_point' => 'required|max:100',
            'operation_center' => 'max:150',
            'service_subcategory_id' => 'required|numeric',
            'request' => 'required',
            'city_id' => 'required',
            'habeas_data' => 'required',
            'city_text' => 'required_if:city_id,==,1124',
            'type_category' => 'required_if:service_category_id,==,1',
            'album' => 'required_if:service_category_id,==,6',
            'spreadsheets' => 'required_if:service_category_id,==,6',
            //'file2' => 'required_if:service_category_id,==,1|mimes:jpeg,png,jpg,pdf,csv,xlsx,xls|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'file2.mimes' => 'El archivo debe ser jpeg,png,jpg, excel o pdf',
            'file2.max' => 'El archivo no debe pesar más de 2GB',
            'city_text.required_if' => 'El campo ¿Cuál? es obligatorio cuando se selecciona otra ciudad ',
            'file2.required_if' => 'para servicio con trasportadora de valores es obligatorio anexar el formato de solicitud',
            'album.required_if' => 'Debes seleccionar albúm',
            'spreadsheets.required_if' => 'Debes seleccionar planilla'
        ];
    }
}
