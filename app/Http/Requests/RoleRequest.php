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
        return [
            'name' => [
                'required',
                Rule::unique('users_roles', 'name')->ignore($this->role),
                'max:255'
            ],
            'permission' => 'required',
        ];
    }

    public function messages() {
        return [
            'permission.required' => 'Musíte vybrať aspoň jedno povolenie s nasledovného zoznamu.',
        ];
    }
}
