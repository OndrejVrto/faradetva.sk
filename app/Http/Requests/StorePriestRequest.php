<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StorePriestRequest extends FormRequest
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
			'titles_before' => 'nullable|string|max:255',
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'titles_after' => 'nullable|string|max:255',
			'function' => 'nullable|string|max:255',
			'phone' => 'nullable|regex:/[\d\+\-\ ]+/',
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

        Session::put(['priest_old_input_checkbox' => $state]);
	}
}
