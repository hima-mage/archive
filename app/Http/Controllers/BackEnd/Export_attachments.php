<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Export_attachments\Store;
use App\Models\Export_attachment;

class Export_attachments extends BackEndController
{

    public function __construct(Export_attachment $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['export'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Export_attachment::get(),
        ];
        return $array;
    }

    public function store(Store $request){
        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/exports') , $fileName);
                $requestArray =  ['desc'=>$request->desc, 'file' => $fileName, 'export_id' => $request->export_id];
                $row = Export_attachment::create($requestArray);

                $col = '<tr>
                <td>
                   '.$row->id.'
                </td>
                <td>
                    '.$row->desc.'
                 </td>
                 <td>
                   <a href="/uploads/exports/'.$row->file.'" target="_blank">عرض</a>
               </td>
                <td class="td-actions text-right">
                    <!--a href="'.route('export_attachments.edit' , ['id' => $row->id]).'" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                        <i class="fa fa-edit"></i>
                    </a-->
                                                                    
                    <form action="'.route('export_attachments.destroy' , ['id' => $row->id]).'" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                        <a class="btn btn-white btn-link btn-sm delete-confirmation" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                        </a>
                    </form>
                </td>
            </tr>';
            }
        }
        return response()->json(['success'=>'تم إضافة المرفقات بنجاح', 'col'=>$col]);
    }

    public function update($id , Store $request){
        if (isset($request->file) && !empty($request->file)) {
            $fileName = $this->uploadFile($request);
            $requestArray =  ['file' => $fileName];
            $row = $this->model->FindOrFail($id);
            $row->update($requestArray);
            return redirect()->route('exports.show', ['id'=>$row->export_id]);
        } else {
            return "jjjjj";
        }
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }

    protected function uploadFile($request){
        $file = $request->file('file');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/exports') , $fileName);
        return $fileName;
    }
}

