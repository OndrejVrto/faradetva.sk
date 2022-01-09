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
        if (request()->routeIs('permissions.store'))
        {
            $rules = ['name' => 'required|unique:users_permissions,name'];
        }
        elseif (request()->routeIs('permissions.update')) {
            $rules = ['name' => 'required',
                        Rule::unique('users_permissions', 'name')->ignore($this->permission)
                    ];
        }

        return $rules;
    }
}
