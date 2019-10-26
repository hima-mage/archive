<?php

namespace App\Http\Requests\Backend\Export_reminders;

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
            'num_reminders' => ['required'],
        ];
        if($this->reminder1 != null){
            $rules =  [
                'type1' => ['required'],
                'user1' => ['required', 'integer'],
                'datetime1' => ['required', 'date'],
                'export_id' => ['required', 'integer'],
            ];
        }
        if($this->reminder2 != null){
            $rules =  [
                'type2' => ['required'],
                'user2' => ['required', 'integer'],
                'datetime2' => ['required', 'date'],
                'export_id' => ['required', 'integer'],
            ];
        }
        if($this->reminde3 != null){
            $rules =  [
                'type3' => ['required'],
                'user3' => ['required', 'integer'],
                'datetime3' => ['required', 'date'],
                'export_id' => ['required', 'integer'],
            ];
        }
        if($this->reminder4 != null){
            $rules =  [
                'type4' => ['required'],
                'user4' => ['required', 'integer'],
                'datetime4' => ['required', 'date'],
                'export_id' => ['required', 'integer'],
            ];
        }
    return $rules;

    }

    public function attributes(){

        return [
            'num_reminders' => 'عدد التذكيرات',
        ];

   }
    
}
