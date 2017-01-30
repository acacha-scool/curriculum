<?php

namespace Scool\Curriculum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StudyBrowseRequest.
 *
 * @package Scool\Curriculum\Http\Requests
 */
class StudyBrowseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('browse studies');
    }

}
