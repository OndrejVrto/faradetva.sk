<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nick' => [
                'required',
                Rule::unique('users', 'nick')->ignore($this->user)
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'name' => [
                'required',
                'string',
                'max:255'],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed'
            ],
            'photo_avatar' => [
                'nullable',
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=100,min_height=100',
                'max:3000'
            ],
        ];
    }

    public function messages() {
        return [
            'photo_avatar.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
        ];
    }
}