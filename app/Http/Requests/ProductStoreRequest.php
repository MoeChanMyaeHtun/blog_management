<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'description.required' => 'Descrition is required!',
            'category.required' => 'Category is required!',
            'price.required' => 'Price is required!',
        ];
    }
}
