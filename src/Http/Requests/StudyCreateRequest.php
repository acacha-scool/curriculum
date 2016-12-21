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
        //Who can create study:
        //- Admin
        //- Certain roles
        return true;

        // Only allow logged in users
        // return \Auth::check();
    }

    // OPTIONAL OVERRIDE
    public function forbiddenResponse()
    {
        // Optionally, send a custom response on authorize failure
        // (default is to just redirect to initial page with errors)
        //
        // Can return a response, a view, a redirect, or whatever else
        return Response::make('Permission denied foo!', 403);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'law_id' => 'required',
        ];
    }
}
