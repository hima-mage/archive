<?php

namespace App\Http\Requests\Backend\Export_attachments;

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
            'desc' => ['required'],
            'attachments' => ['required'],
            'export_id' => ['required'],
        ];
        return $rules;

    }

    public function attributes(){

        return [
            'desc' => 'الموضوع',
            'attachments' => 'المرفقات',
        ];

   }

}
