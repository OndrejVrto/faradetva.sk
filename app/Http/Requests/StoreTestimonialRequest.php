<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreTestimonialRequest extends FormRequest
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
			'active' => 'boolean',
			'name' => 'required|string|max:255',
			'function' => 'nullable|string|max:255',
			'description' => 'nullable|string',
			'photo' => 'nullable|file|mimes:jpg,bmp,png,jpeg',
        ];
    }

	protected function prepareForValidation()
	{
		$state = $this->active ? 1 : 0;

		$this->merge([
			'active' => $state,
		]);

        Session::put(['testimonial_old_input_checkbox' => $state]);
	}
}
