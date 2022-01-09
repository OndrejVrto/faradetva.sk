<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class SliderRequest extends FormRequest
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

        if (request()->routeIs('sliders.store')) {
            $photoRule = 'required';
        } elseif (request()->routeIs('sliders.update')) {
            $photoRule = 'sometimes|nullable';
        }

        return [
            'active' => 'boolean',
            'heading_1' => 'nullable|string|max:255',
            'heading_2' => 'nullable|string|max:255',
            'heading_3' => 'nullable|string|max:255',
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=800',
                'max:10000'
            ],
        ];
    }


    public function messages()
    {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }


    protected function prepareForValidation()
    {
        $state = $this->active ? 1 : 0;

        $this->merge([
            'active' => $state,
        ]);

        Session::put(['slider_old_input_checkbox' => $state]);
    }
}
