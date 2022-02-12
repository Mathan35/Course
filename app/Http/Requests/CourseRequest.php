<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'                   => 'required',
            'short_description'      => 'required',
            'detailed_description'   => 'required',
            'price'                  => 'required',
            'actual_price'           => 'required',
            'offer_percentange'      => 'required',
            'course_level'           => 'required',
            'course_duration'        => 'required',
            'class_type'             => 'required',
            'language'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                   => 'The name field is required..',
            'short_description.required'      => 'The short description field is required..',
            'detailed_description.required'   => 'The detailed description field is required..',
            'price.required'                  => 'The impricege field is required..',
            'image.required'                  => 'The image field is required..',
        ];
    }
}
