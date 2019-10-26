<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Videos\Store;
use App\Models\Video;
use App\Models\Video_attachment;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Videos extends BackEndController
{

    public function __construct(Video $model)
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
            'moduleName' => 'الفيديو',
            'sModuleName' => 'فيديو',
            'pageTitle' => 'أرشيف الفيديو',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'video_number' => Video::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = Video::findOrFail($id);
        $attachments = Video_attachment::where('video_id', $id)->get();
        $routeName = 'Video_attachments';
        $sModuleName = 'مرفق';
        $pageTitle = 'أرشيف الفيديو';
        return view('back-end.videos.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/videos') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'type' => 'image','video_id' => $row->id];
                Video_attachment::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة الفيديو بنجاح']);
        //return redirect()->route('videos.index');
    }

    public function update($id, Store $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        if (isset($request->attachments) && !empty($request->attachments)) {
            foreach($request->attachments as $attachment) {
                $fileName1 = time().str_random('10').'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('uploads/videos') , $fileName1);
                $requestArray1 =  ['file' => $fileName1, 'video_id' => $row->id];
                Video_attachment::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث الفيديو بنجاح']);
        //return redirect()->route('videos.edit', ['id' => $row->id]);
    }

    protected function uploadAttachments($request){
        $file = $request->file('attachments');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/videos') , $fileName);
        return $fileName;
    }

	//////////////
    public function serchvideo(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $videos = Video::where('id', '=', $text)
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
            $videos = Video::get();
        }

						if($videos !="[]") {
                            foreach ($videos as $video) {
							?>
                                <tr class="gradeX">
                                    <td><?=$video->id ; ?></td>
                                    <td><?=$video->name ; ?></td>
                                    <td><?=$video->date ; ?></td>
                                    <td>
                                        <a href="/admin/videos/<?=$video->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/videos/<?=$video->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/videos/<?=$video->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
