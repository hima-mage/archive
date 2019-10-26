<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Import_attachments\Store;
use App\Models\Import_attachment;

class Import_attachments extends BackEndController
{

    public function __construct(Import_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['import'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Import_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('imports.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('imports.show', ['id'=>$row->import_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

