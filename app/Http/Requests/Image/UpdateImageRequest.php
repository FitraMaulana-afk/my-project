<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'destination_id' => [
                'nullable',
            ],
            'title' => [
                'nullable',
                'string',
                'max:50',
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:png,jpg',
                'max:4035'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Colom Title must be filled with letters',
            'title.max' => 'Title must be no longer than 50 characters',
            'image.image' => 'Image must be type image',
            'image.mimes' => 'Image must be type png or jpeg',
            'image.max' => 'The image field must not be greater than 4 megabytes',
        ];
    }
}
