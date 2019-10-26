<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\General_attachments\Store;
use App\Models\General_attachment;

class General_attachments extends BackEndController
{

    public function __construct(General_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['general'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => General_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('generals.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('generals.show', ['id'=>$row->general_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

