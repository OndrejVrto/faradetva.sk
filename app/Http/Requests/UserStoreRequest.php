<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nick' => ['required', 'unique:users,nick'],
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'photo_avatar' => [
				'required',
				'file',
				'mimes:jpg,bmp,png,jpeg,svg',
				'dimensions:min_width=100,min_height=100',
				'max:3000'
			],
        ];
    }

	public function messages()
	{
		return [
			'photo_avatar.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
		];
	}

}
