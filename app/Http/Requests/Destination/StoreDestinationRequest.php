<?php

namespace App\Http\Requests\Destination;

use App\Enums\PublishStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDestinationRequest extends FormRequest
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
            'country_id' => [
                'required',
            ],
            'province_id' => [
                'required',
            ],
            'title' => [
                'required',
                'string',
                'max:50',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'required',
                'image',
                'mimes:png,jpg',
                'max:4035'
            ],
            'status' => [
                'required',
                Rule::in(PublishStatusEnum::STATUS),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'country_id' => 'Country must be required',
            'province' => 'Province must be required',
            'title.required' => 'Title must be required',
            'title.string' => 'Colom Title must be filled with letters',
            'title.max' => 'Title must be no longer than 50 characters',
            'description.required' => 'Description must be required',
            'image.required' => 'Image must be required',
            'image.image' => 'Image must be type image',
            'image.mimes' => 'Image must be type png or jpeg',
            'image.max' => 'The image field must not be greater than 4 megabytes',
        ];
    }
}
