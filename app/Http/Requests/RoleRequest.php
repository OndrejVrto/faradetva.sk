<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class RoleRequest extends BaseRequest {
    /**
     * @return array{name: \Illuminate\Validation\Rules\Unique[]|string[], permission: string[]}
     */
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
