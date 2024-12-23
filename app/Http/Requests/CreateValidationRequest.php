<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name' => [new Uppercase(),'required','unique:books'],
                'price' => 'required|integer|min:0',
                'category_id' => 'required|integer|exists:categories,id',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ];
    }
}
