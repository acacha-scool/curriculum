<?php

namespace Scool\Curriculum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StudyCreateRequest.
 *
 * @package Scool\Curriculum\Http\Requests
 */
class StudyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
