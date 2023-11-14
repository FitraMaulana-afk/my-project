<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'required',
                // 'image',
                // 'mimes:png,jpg',
                // 'max:4035'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name must be required',
            'name.string' => 'Colom name must be filled with letters',
            'name.max' => 'Name must be no longer than 50 characters',
            'description.required' => 'Description must be required',
            'image.required' => 'Image must be required',
            'image.image' => 'Image must be type image',
            'image.mimes' => 'Image must be type png or jpeg',
            'image.max' => 'The image field must not be greater than 4 megabytes',
        ];
    }
}