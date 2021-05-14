<?php

namespace App\Http\Requests\Admin;

use App\Rules\CheckOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdatePassword extends FormRequest
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
            'old_password'  =>  ['required', 'string', 'min:8', 'max:42', new CheckOldPassword(auth('admin')->user()->password)],
            'password'      =>  ['required', 'string', 'min:8', 'max:42', 'confirmed']
        ];
    }
}
