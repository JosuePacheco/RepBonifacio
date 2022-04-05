<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "clave" => "required|unique:products,clave," . $this->id,
            "description" => "required",
            "weight" => "required|numeric",
            "observations" => "required",
            "price" => "required|numeric",
            "price_purchase" => "required|numeric",
            "discount" => "required|numeric",
            "branch_id" => "required",
            "line_id" => "required",
            "category_id" => "required",
        ];
    }
}
