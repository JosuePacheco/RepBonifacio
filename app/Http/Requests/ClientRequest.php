<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            "name" => "required",
            "first_lastname" => "required",
            "second_lastname" => "required",
            "telephone_number" =>
                "required|unique:clients,telephone_number," . $this->id,
            "credit" => "required",
            "positive_balance" => "required",
            "type" => "required|in:0,1",
        ];
    }
}
