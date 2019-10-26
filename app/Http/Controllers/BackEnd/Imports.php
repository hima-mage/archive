<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Imports\Store;
use App\Models\Import;
use App\Models\Import_attachment;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Imports extends BackEndController
{

    public function __construct(Import $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'sub_cat', 'from_cat', 'from_sub_cat', 'admin', 'dept', 'user', 'attaches'];
    }


    protected function append()
    {
        $array =  [
            'moduleName' => 'الوارد',
            'sModuleName' => 'وارد',
            'pageTitle' => 'أرشيف الوارد',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'import_number' => Import::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = Import::findOrFail($id);
        $attachments = Import_attachment::where('import_id', $id)->get();
        $routeName = 'import_attachments';
        $sModuleName = 'مرفق';
        $pageTitle = 'أرشيف الوارد';
        return view('back-end.imports.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        if (isset($request->main_file) && !empty($request->main_file)) {
            $fileName = $this->uploadFile($request);
        } else {
            $fileName = "";
        }
        $requestArray =  ['user_id' => auth()->user()->id , 'main_file' => $fileName] + $request->all();
        $row = $this->model->create($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/imports') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'import_id' => $row->id];
                Import_attachment::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة الوارد بنجاح']);
        //return redirect()->route('imports.index');
    }

    public function update($id, Store $request)
    {
        if (isset($request->main_file) && !empty($request->main_file)) {
            $fileName = $this->uploadFile($request);
            $requestArray =  ['main_file' => $fileName] + $request->all();
        }
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/import') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'import_id' => $row->id];
                Import_attachment::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث الوارد بنجاح']);
        //return redirect()->route('imports.edit', ['id' => $row->id]);
    }

    protected function uploadFile($request){
        $file = $request->file('main_file');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/imports') , $fileName);
        return $fileName;
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/imports') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchimport(){
        $text=trim(request()->text);
        if(!empty($text)) {
            if($text=="سري" || $text=="سري جدا" || $text=="شديد السرية") {
                if($text=="سري") {
                    $text = "1";
                } elseif($text=="سري جدا") {
                    $text = "2";
                } elseif($text=="شديد السرية") {
                    $text = "3";
                }
                $imports = Import::where('confidentiality', '=', $text)->get();
            } elseif($text=="هام" || $text=="هام جدا" || $text=="شديد الأهمية") {
                if($text=="هام") {
                    $text = "1";
                } elseif($text=="هام جدا") {
                    $text = "2";
                } elseif($text=="شديد الأهمية") {
                    $text = "3";
                }
                $imports = Import::where('priority', '=', $text)->get();
            } else {
                $imports =Import::where('id', '=', $text)
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
                ->orWhere('from_category', function($query) use ($text) { 
                    $query->select('id')->from('categories')->where("name","=",$text)->first();
                })
                ->orWhere('from_sub_category', function($query) use ($text) { 
                    $query->select('id')->from('sub_categories')->where("name","=",$text)->first();
                })
                ->orWhere('date', '=', $text)
                ->orWhere('follow_date', '=', $text)
                ->get();
            }
        } elseif($text=="") {
            $imports = Import::get();
        }

						if($imports !="[]") {
                            foreach ($imports as $import) {
							?>
                                <tr class="gradeX">
                                    <td><?=$import->id ; ?></td>
                                    <td><?=$import->name ; ?></td>
                                    <td><?=$import->date ; ?></td>
                                    <td>
                                        <?php
                                            if($import->priority==1) {
                                                echo "هام";
                                            } elseif($import->priority==2) {
                                                echo "هام جدا";
                                            } elseif($import->priority==3) {
                                                echo "شديد الأهمية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($import->confidentiality==1) {
                                                echo "سري";
                                            } elseif($import->confidentiality==2) {
                                                echo "سري جدا";
                                            } elseif($import->confidentiality==3) {
                                                echo "شديد السرية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/admin/imports/<?=$import->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/imports/<?=$import->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/imports/<?=$import->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
