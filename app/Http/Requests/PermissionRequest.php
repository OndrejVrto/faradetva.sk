<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PermissionRequest extends BaseRequest {
    public function rules(): array {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('users_permissions', 'name')->ignore($this->permission),
            ]
        ];
    }
}
