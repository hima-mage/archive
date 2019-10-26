<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Form_attachments\Store;
use App\Models\Form_attachment;

class Form_attachments extends BackEndController
{

    public function __construct(Form_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['form'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Form_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('forms.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('forms.show', ['id'=>$row->form_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

