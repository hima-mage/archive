<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Video_attachments\Store;
use App\Models\Video_attachment;

class Video_attachments extends BackEndController
{

    public function __construct(Video_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['video'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Video_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return redirect()->route('videos.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('videos.show', ['id'=>$row->video_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

