<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Traits\HasCropPictureFields;

class UserRequest extends BaseRequest
{
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'active'       => $this->reqBoolRule(),
            'name'         => $this->reqStrRule(),
            'twitter_url'  => $this->nullUrlRule(),
            'facebook_url' => $this->nullUrlRule(),
            'www_page_url' => $this->nullUrlRule(),
            'slug'         => Rule::unique('users', 'slug')->ignore($this->user)->withoutTrashed(),
            'nick' => [
                'required',
                Rule::unique('users', 'nick')->ignore($this->user),
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns,filter',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'password' => [
                $this->requireORnullable(),
                'confirmed',
                'max:255',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'can_be_impersonated' => [
                'boolean',
            ],
            'role' => [
                'nullable',
            ],
            'phone' => [
                'nullable',
                'regex:/[\d\+\-\ ]+/',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
