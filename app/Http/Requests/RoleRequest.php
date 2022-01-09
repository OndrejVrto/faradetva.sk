<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('roles.store')) {
            $rules = [
                'name' => 'required|unique:users_roles,name',
                'permission' => 'required',
            ];
        } else if (request()->routeIs('roles.update')) {
            $rules = [
                'name' => ['required',    Rule::unique('users_roles', 'name')->ignore($this->role)],
                'permission' => 'required',
            ];
        }

        return $rules;
    }
}
