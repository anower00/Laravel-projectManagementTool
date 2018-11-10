<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'projectName' => 'required|alpha',
            'codeName' => 'required',
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'uploadDocument' => 'required'
        ];
    }
}
