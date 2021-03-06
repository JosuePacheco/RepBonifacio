<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            "name" => "required|max:255",
            "name_legal_re" => "required|max:255",
            "email" => "required|email|max:255",
            "telephone_number" => "required|max:255",
            "rfc" => "required|max:255",
            "address" => "required|max:255",
            "municipality_id" => "required",
            "commission" => "required",
        ];
    }
}
