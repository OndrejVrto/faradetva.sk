<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
		if (request()->routeIs('roles.store'))
		{
			$rules = [
				'name' => 'required|unique:users_roles,name',
				'permission' => 'required',
			];
		}
		elseif (request()->routeIs('roles.update'))
		{
			$rules = [
				'name' => ['required',	Rule::unique('users_roles', 'name')->ignore($this->role)],
				'permission' => 'required',
			];
		}

		return $rules;
    }

}
