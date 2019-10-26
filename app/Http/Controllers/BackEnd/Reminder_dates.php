<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Reminder_dates\Store;
use App\Models\Reminder_date;

class Reminder_dates extends BackEndController
{

    public function __construct(Reminder_date $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['reminder'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'التاريخ',
            'sModuleName' => 'تاريخ',
            'pageTitle' => 'تواريخ التذكير',
            'rows' => Reminder_date::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('reminders.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('reminders.show', ['id'=>$row->reminder_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

