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
            'name'=>'required|max:100',
            'email'=>'required|email',
            'company' => 'required|max:100',
            'cellphone'=>'required|max:20',
            'sapnumber'=>'max:100',
            'identification'=>'required|max:50',
            'sell_point'=>'required|max:100',
            'operation_center'=>'max:150',
            'service_subcategory_id'=>'required|numeric',
            'request'=>'required',
            'subject' => 'required|max:200',
            'city_id' => 'required'
        ];
    }
}
