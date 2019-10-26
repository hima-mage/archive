<?php

namespace App\Http\Requests\Backend\Reminders;

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
        return [
            'category' => ['required'  ,'integer' ],
            'sub_category' => ['required'  ,'integer' ],
            'date' => ['required' ,'date' ],
            'status' => ['required' ],
            'message'  => ['required'],
            'dates'  => ['required'],
        ];
    }

   public function attributes(){

        return [
            'category' => 'التصنيف',
            'sub_category' => 'التصنيف الفرعي',
            'status' => 'الحالة',
            'message' => 'الرسالة',
            'dates' => 'تاريخ التذكير',
        ];

   }
    
}
