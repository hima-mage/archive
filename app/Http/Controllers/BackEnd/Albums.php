<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Albums\Store;
use App\Models\Album;
use App\Models\Album_attachment;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Albums extends BackEndController
{

    public function __construct(Album $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'sub_cat', 'admin', 'dept', 'user', 'attaches', 'attaches'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'الألبوم',
            'sModuleName' => 'ألبوم',
            'pageTitle' => 'أرشيف الصور',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'album_number' => Album::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = Album::findOrFail($id);
        $attachments = Album_attachment::where('album_id', $id)->get();
        $routeName = 'album_attachments';
        $sModuleName = 'مرفق';
        $pageTitle = 'أرشيف الصور';
        return view('back-end.albums.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/albums') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'type' => 'image','album_id' => $row->id];
                Album_attachment::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة الألبوم بنجاح']);
        //return redirect()->route('albums.index');
    }

    public function update($id, Store $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/albums') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'album_id' => $row->id];
                Album_attachment::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث الألبوم بنجاح']);
        //return redirect()->route('albums.edit', ['id' => $row->id]);
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/albums') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchalbum(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $albums = Album::where('id', '=', $text)
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
            $albums = Album::get();
        }
						if($albums !="[]") {
                            foreach ($albums as $album) {
							?>
                                <tr class="gradeX">
                                    <td><?=$album->id ; ?></td>
                                    <td><?=$album->name ; ?></td>
                                    <td><?=$album->date ; ?></td>
                                    <td>
                                        <a href="/admin/albums/<?=$album->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/albums/<?=$album->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/albums/<?=$album->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
