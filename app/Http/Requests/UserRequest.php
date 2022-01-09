<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('users.store'))
        {
            $rules = [
                'nick' => ['required', 'unique:users,nick'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            ];
        }
        elseif (request()->routeIs('users.update'))
        {
            // Let's get the route param by name to get the User object value
            $user = request()->route('user');
            $rules = [
                'nick' => ['required', 'unique:users,nick,'.$user->id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            ];
        }

        $rules = array_merge($rules, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'photo_avatar' => [
                'nullable',
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=100,min_height=100',
                'max:3000'
            ],
        ]);

        return $rules;
    }

    public function messages()
    {
        return [
            'photo_avatar.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
        ];
    }
}
