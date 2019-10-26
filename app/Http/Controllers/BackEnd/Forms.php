<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Forms\Store;
use App\Models\Form;
use App\Models\Form_attachment;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Forms extends BackEndController
{

    public function __construct(Form $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'sub_cat', 'to_cat', 'to_sub_cat', 'admin', 'dept', 'user', 'attaches'];
    }


    protected function append()
    {
        $array =  [
            'moduleName' => 'النموذج',
            'sModuleName' => 'نموذج',
            'pageTitle' => 'أرشيف النماذج',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'form_number' => Form::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = Form::findOrFail($id);
        $attachments = Form_attachment::where('form_id', $id)->get();
        $routeName = 'Form_attachments';
        $sModuleName = 'مرفق';
        $pageTitle = 'أرشيف النموذج';
        return view('back-end.forms.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/forms') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'form_id' => $row->id];
                Form_attachment::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة النموذج بنجاح']);
        //return redirect()->route('forms.index');
    }

    public function update($id, Store $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/forms') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'form_id' => $row->id];
                Form_attachment::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث النموذج بنجاح']);
        //return redirect()->route('forms.edit', ['id' => $row->id]);
    }

    protected function uploadFile($request){
        $file = $request->file('main_file');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/forms') , $fileName);
        return $fileName;
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/forms') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchform(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $forms = Form::where('id', '=', $text)
            ->orWhere('name', '=', $text)
            ->orWhere('category', function($query) use ($text) { 
                $query->select('id')->from('categories')->where("name","=",$text)->first();
            })
            ->orWhere('sub_category', function($query) use ($text) { 
                $query->select('id')->from('sub_categories')->where("name","=",$text)->first();
            })
            ->orWhere('adminstration', function($query) use ($text) { 
                $query->select('id')->from('adminstrations')->where("name","=",$text)->first();
            })
            ->orWhere('department', function($query) use ($text) { 
                $query->select('id')->from('departments')->where("name","=",$text)->first();
            })
            ->orWhere('date', '=', $text)
            ->get();
        } elseif($text=="") {
            $forms = Form::get();
        }


						if($forms !="[]") {
                            foreach ($forms as $form) {
							?>
                                <tr class="gradeX">
                                    <td><?=$form->id ; ?></td>
                                    <td><?=$form->name ; ?></td>
                                    <td><?=$form->date ; ?></td>
                                    <td>
                                        <?php
                                            if($form->priority==1) {
                                                echo "هام";
                                            } elseif($form->priority==2) {
                                                echo "هام جدا";
                                            } elseif($form->priority==3) {
                                                echo "شديد الأهمية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($form->confidentiality==1) {
                                                echo "سري";
                                            } elseif($form->confidentiality==2) {
                                                echo "سري جدا";
                                            } elseif($form->confidentiality==3) {
                                                echo "شديد السرية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/admin/forms/<?=$form->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/forms/<?=$form->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/forms/<?=$form->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
                                            <?=csrf_field(); ?>
                                            <?=method_field('delete'); ?>
                                            <a class="btn btn-white btn-link btn-sm">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </form>

                                    </td>
                                </tr>
							<?php
							}
						} else {
							?>
                                <tr class="gradeX">
                                    <td colspan="12">لا توجد نتائج</td>
                                </tr>
							<?php
						}
    }
	
}
