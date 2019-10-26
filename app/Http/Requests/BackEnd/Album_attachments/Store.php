<?php

namespace App\Http\Requests\Backend\Album_attachments;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
        $rules =  [
            'desc' => ['required', 'max:191'],
            //'file' => ['required'],
            'album_id' => ['required'],
        ];

        if($this->method() == 'PUT'){
            $rules['file'] = 'required';
        }
        return $rules;

    }
}
