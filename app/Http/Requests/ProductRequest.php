<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name_en' => ['required', Rule::unique('products', 'name->en')],
            'name_ar' => ['required', Rule::unique('products', 'name->ar')],
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|min:1',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
    }
}