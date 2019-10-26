<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Album_attachments\Store;
use App\Models\Album_attachment;

class Album_attachments extends BackEndController
{

    public function __construct(Album_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['album'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Album_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('albums.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('albums.show', ['id'=>$row->album_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

