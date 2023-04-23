<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
			'title' => 'required|max:255|unique:books,title,' . $this->book->id,
			'description' => 'nullable|max:65535',
			'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
