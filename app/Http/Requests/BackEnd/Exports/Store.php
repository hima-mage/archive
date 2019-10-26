<?php

namespace App\Http\Requests\Backend\Exports;

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
        if($this->method() == 'PATCH'){
            $rules = [
                'main_file' => ['required', 'mimes:docx,doc,pdf'],
            ];
        } else {
            $rules = [
                'name' => ['required', 'max:191'],
                'to_category' => ['required'  ,'integer' ] ,
                'to_sub_category' => ['required'  ,'integer' ] ,
                'category' => ['required'  ,'integer' ],
                'sub_category' => ['required'  ,'integer' ],
                'adminstration' => ['required'  ,'integer' ],
                'department' => ['required'  ,'integer' ],
                'date' => ['required' ,'date' ],
                //'follow_status' => ['required' ],
                //'follow_date'  => ['required' ,'date' ],
                'priority'  => ['required'],
                'confidentiality'  => ['required'],
            ];
        }

        return $rules;
    }

   public function attributes(){

        return [
            'to_category' => 'صادر إلى',
            'to_sub_category' => 'صادر إلى',
            'category' => 'التصنيف',
            'sub_category' => 'التصنيف الفرعي',
            'adminstration' => 'الإدارة',
            'department' => 'القسم',
            'follow_status' => 'حالة المتابعة',
            'priority' => 'درجة الأهمية',
            'confidentiality' => 'درجة السرية',
            'follow_status' => 'حالة المتابعة',
            'follow_date' => 'تاريخ المتابعة',
        ];

   }
    
}
