<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment_text' => 'required',
            'ticket_id' => 'required',
            'file' => 'sometimes|mimes:jpeg,png,jpg,pdf|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'El archivo debe ser jpeg,png,jpg o pdf',
        ];
    }
}
