<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
				'string',
				Rule::unique('news', 'title')->ignore($this->news)->whereNull('deleted_at')
			],
			'content' => 'required',
			'category_id' => 'required|exists:categories,id',
			'file_news.*' => 'file|mimes:jpg,bmp,png',
			// 'tags' => 'required',
		];

	}

}
