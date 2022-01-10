<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => [
                'required',
                Rule::unique('users_permissions', 'name')->ignore($this->permission)
            ]
        ];
    }
}
