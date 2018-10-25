<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
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
            'sapnumber'=>'max:100',
            
        ];
    }
    public function messages()
    {
        return [
            'file2.mimes' => 'El archivo debe ser jpeg,png,jpg o pdf',
            'file2.max' => 'El archivo no debe pesar más de 2GB',
            'city_text.required_if' => 'El campo ¿Cúal? es obligatorio cuando se selecciona otra ciudad ',
        ];
    }
}
