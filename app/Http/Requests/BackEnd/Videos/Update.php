<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            "name" => ["required", "max:191"],
            "desc" => ["required", "min:10"],
            "youtube" => ["required", "min:10", "url"],
            "image" => ["image"],
            "published" => ["required"],
            "cat_id" => ["required", "integer"],
            "meta_keywords" => ["max:191"],
            "meta_desc" => ["max:191"],
        ];
    }
}
