<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Generals\Store;
use App\Models\General;
use App\Models\General_attachment;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Generals extends BackEndController
{

    public function __construct(General $model)
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
            'moduleName' => 'الأرشيف العام',
            'sModuleName' => 'أرشيف عام',
            'pageTitle' => 'الأرشيف العام',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'general_number' => General::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = General::findOrFail($id);
        $attachments = General_attachment::where('general_id', $id)->get();
        $routeName = 'General_attachments';
        $sModuleName = 'مرفق';
        $pageTitle = 'الأرشيف العام';
        return view('back-end.generals.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
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
                $attachment->move(public_path('uploads/generals') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'general_id' => $row->id];
                General_attachment::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة العام بنجاح']);
        //return redirect()->route('generals.index');
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
                $attachment->move(public_path('uploads/generals') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'general_id' => $row->id];
                General_attachment::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث العام بنجاح']);
        //return redirect()->route('generals.edit', ['id' => $row->id]);
    }

    protected function uploadFile($request){
        $file = $request->file('main_file');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/generals') , $fileName);
        return $fileName;
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/generals') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchgeneral(){
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
                $generals = General::where('confidentiality', '=', $text)->get();
            } elseif($text=="هام" || $text=="هام جدا" || $text=="شديد الأهمية") {
                if($text=="هام") {
                    $text = "1";
                } elseif($text=="هام جدا") {
                    $text = "2";
                } elseif($text=="شديد الأهمية") {
                    $text = "3";
                }
                $generals = General::where('priority', '=', $text)->get();
            } else {
                $generals = General::where('id', '=', $text)
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
                ->orWhere('to_category', function($query) use ($text) { 
                    $query->select('id')->from('categories')->where("name","=",$text)->first();
                })
                ->orWhere('to_sub_category', function($query) use ($text) { 
                    $query->select('id')->from('sub_categories')->where("name","=",$text)->first();
                })
                ->orWhere('date', '=', $text)
                ->orWhere('follow_date', '=', $text)
                ->get();
            }
        } elseif($text=="") {
            $generals = General::get();
        }

						if($generals !="[]") {
                            foreach ($generals as $general) {
							?>
                                <tr class="gradeX">
                                    <td><?=$general->id ; ?></td>
                                    <td><?=$general->name ; ?></td>
                                    <td><?=$general->date ; ?></td>
                                    <td>
                                        <?php
                                            if($general->priority==1) {
                                                echo "هام";
                                            } elseif($general->priority==2) {
                                                echo "هام جدا";
                                            } elseif($general->priority==3) {
                                                echo "شديد الأهمية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($general->confidentiality==1) {
                                                echo "سري";
                                            } elseif($general->confidentiality==2) {
                                                echo "سري جدا";
                                            } elseif($general->confidentiality==3) {
                                                echo "شديد السرية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/admin/generals/<?=$general->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/generals/<?=$general->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/generals/<?=$general->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
