<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
		dd($this);

        return [
			// 'active' => 'boolean',
			'titles_before' => 'required|string|max:255',
			'first_name' => 'required|string|max:255',
			'last_name' => 'string|max:255',
			'titles_after' => 'string|max:255',
			'function' => 'string|max:255',
			'description' => 'string|max:255',
        ];
    }
}
