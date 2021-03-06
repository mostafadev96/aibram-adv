<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementUpdate extends FormRequest
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
            'marketing.*.age_from' => 'required',
            'marketing.*.age_to' => 'required',
            'marketing.*.city_id' => 'required',
            'marketing.*.gender' => 'required',
        ];
    }
}
