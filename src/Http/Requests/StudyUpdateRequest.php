<?php

namespace Scool\Curriculum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StudyUpdateRequest.
 *
 * @package Scool\Curriculum\Http\Requests
 */
class StudyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('edit studies');
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
