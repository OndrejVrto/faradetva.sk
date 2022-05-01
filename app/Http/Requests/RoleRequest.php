<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class RoleRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('users_roles', 'name')->ignore($this->role),
            ],
            'permission' => [
                'required',
                'max:255',
            ],
        ];
    }

    public function messages(): array {
        return [
            'permission.required' => 'Musíte vybrať aspoň jedno povolenie s nasledovného zoznamu.',
        ];
    }
}
