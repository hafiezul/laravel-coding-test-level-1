<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'unique:events,slug,'.$this->id, 'max:255'],
            'startAt' => ['required', 'date'],
            'endAt' => ['required', 'date'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must be less than 255 characters.',
            'slug.required' => 'The slug field is required.',
            'slug.unique' => 'The slug field must be unique.',
            'slug.max' => 'The slug field must be less than 255 characters.',
            'startAt.required' => 'The startAt field is required.',
            'startAt.date' => 'The startAt field must be a valid date.',
            'endAt.required' => 'The endAt field is required.',
            'endAt.date' => 'The endAt field must be a valid date.',
        ];
    }
}
