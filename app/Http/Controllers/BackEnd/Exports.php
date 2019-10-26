<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Exports\Store;
use App\Models\Export;
use App\Models\Export_attachment;
use App\Models\Export_reminder;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Exports extends BackEndController
{

    public function __construct(Export $model)
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
            'moduleName' => 'الصادر',
            'sModuleName' => 'صادر',
            'pageTitle' => 'أرشيف الصادر',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'export_number' => Export::orderBy('id', 'desc')->first(),
            'users' => User::get(),
        ];
        return $array;
    }

    public function show($id){
        $row = Export::findOrFail($id);
        $attachments = Export_attachment::where('export_id', $id)->get();
        $reminders = Export_reminder::where('export_id', $id)->with('user')->get();
        $attachmentRouteName = 'export_attachments';
        $reminderRouteName = 'export_reminders';
        $sModuleName = 'مرفق';
        $pageTitle = 'أرشيف الصادر';
        return view('back-end.exports.show',compact('pageTitle','row','attachments','reminders','attachmentRouteName','reminderRouteName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);
        return response()->json(['success'=>'تم إضافة الصادر بنجاح', 'id'=>$row->id]);
        //return redirect()->route('exports.index');
    }

    public function update($id, Store $request)
    {
        if (isset($request->main_file) && !empty($request->main_file)) {
            $fileName = $this->uploadFile($request);
            $requestArray =  ['main_file' => $fileName] + $request->all();
        } else {
            $requestArray =  $request->all();
        }
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        return response()->json(['success'=>'تم تحديث الصادر بنجاح', 'link'=>$row->main_file]);
        //return redirect()->route('exports.edit', ['id' => $row->id]);
    }

    protected function uploadFile($request){
        $file = $request->file('main_file');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/exports') , $fileName);
        return $fileName;
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/exports') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchexport(){
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
                $exports = Export::where('confidentiality', '=', $text)->get();
            } elseif($text=="هام" || $text=="هام جدا" || $text=="شديد الأهمية") {
                if($text=="هام") {
                    $text = "1";
                } elseif($text=="هام جدا") {
                    $text = "2";
                } elseif($text=="شديد الأهمية") {
                    $text = "3";
                }
                $exports = Export::where('priority', '=', $text)->get();
            } else {
                $exports = Export::where('id', '=', $text)
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
            $exports = Export::get();
        }

						if($exports !="[]") {
                            foreach ($exports as $export) {
							?>
                                <tr class="gradeX">
                                    <td><?=$export->id ; ?></td>
                                    <td><?=$export->name ; ?></td>
                                    <td><?=$export->date ; ?></td>
                                    <td>
                                        <?php
                                            if($export->priority==1) {
                                                echo "هام";
                                            } elseif($export->priority==2) {
                                                echo "هام جدا";
                                            } elseif($export->priority==3) {
                                                echo "شديد الأهمية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($export->confidentiality==1) {
                                                echo "سري";
                                            } elseif($export->confidentiality==2) {
                                                echo "سري جدا";
                                            } elseif($export->confidentiality==3) {
                                                echo "شديد السرية";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/admin/exports/<?=$export->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/exports/<?=$export->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/exports/<?=$export->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
