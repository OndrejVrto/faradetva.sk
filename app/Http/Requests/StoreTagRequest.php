<?php

namespace App\Http\Requests;

use App\Rules\SingleWord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest
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
            'title' => [
				'required',
				new SingleWord,
				'max:30',
				'alpha',
				Rule::unique('tags', 'title')->ignore($this->tag)->whereNull('deleted_at')
			],
			'description' => 'required|max:255'
        ];
    }
}
