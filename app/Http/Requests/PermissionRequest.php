<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class PermissionRequest extends BaseRequest
{
    public function rules() {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('users_permissions', 'name')->ignore($this->permission),
            ]
        ];
    }
}
