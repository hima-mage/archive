<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Reminders\Store;
use App\Models\Reminder;
use App\Models\Reminder_date;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Adminstration;
use App\Models\Department;
use App\Models\User;

class Reminders extends BackEndController
{

    public function __construct(Reminder $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'sub_cat', 'user', 'dates'];
    }


    protected function append()
    {
        $array =  [
            'moduleName' => 'التذكير',
            'sModuleName' => 'تذكير',
            'pageTitle' => 'التذكيرات العامة',
            'categories' => Category::get(),
            'sub_categories' => Sub_category::get(),
            'adminstrations' => Adminstration::get(),
            'departments' => Department::get(),
            'reminder_number' => Reminder::orderBy('id', 'desc')->first(),
        ];
        return $array;
    }

    public function show($id){
        $row = Reminder::findOrFail($id);
        $attachments = Reminder_date::where('reminder_id', $id)->get();
        $routeName = 'Reminder_date';
        $sModuleName = 'مرفق';
        $pageTitle = 'التذكيرات العامة';
        return view('back-end.reminders.show',compact('pageTitle','row','attachments','routeName','sModuleName'));
    }
    
    public function store(Store $request)
    {
        $requestArray =  ['user_id' => auth()->user()->id] + $request->all();
        $row = $this->model->create($requestArray);

        if (isset($request->dates) && !empty($request->dates)) {
            foreach($request->dates as $date) {
                $requestArray1 =  ['date' => $date, 'reminder_id' => $row->id];
                Reminder_date::create($requestArray1);
            }
        }
        
        return response()->json(['success'=>'تم إضافة التذكير بنجاح']);
        //return redirect()->route('reminders.index');
    }

    public function update($id, Store $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);

        if (isset($request->dates) && !empty($request->dates)) {
            foreach($request->dates as $date) {
                $requestArray1 =  ['date' => $date->dates, 'reminder_id' => $row->id];
                Reminder_date::create($requestArray1);
            }
        }

        return response()->json(['success'=>'تم تحديث التذكير بنجاح']);
        //return redirect()->route('reminders.edit', ['id' => $row->id]);
    }


	//////////////
    public function serchreminder(){
        $text=trim(request()->text);
        if(!empty($text)) {
            if($text=="فعال" || $text=="غير فعال") {
                if($text=="فعال") {
                    $text = "1";
                } elseif($text=="غير فعال") {
                    $text = "0";
                }
            } else {
                $reminders = Reminder::where('status', '=', $text)->get();

                $reminders = Reminder::where('id', '=', $text)
                ->orWhere('category', function($query) use ($text) { 
                    $query->select('id')->from('categories')->where("name","=",$text)->first();
                })
                ->orWhere('sub_category', function($query) use ($text) { 
                    $query->select('id')->from('sub_categories')->where("name","=",$text)->first();
                })
                ->orWhere('date', '=', $text)
                ->get();
            }
        } elseif($text=="") {
            $reminders = Reminder::get();
        }

						if($reminders !="[]") {
                            foreach ($reminders as $reminder) {
							?>
                                <tr class="gradeX">
                                    <td><?=$reminder->id ; ?></td>
                                    <td><?=$reminder->date ; ?></td>
                                    <td><?=$reminder->message ; ?></td>
                                    <td><?=$reminder->dates->count() ; ?></td>
                                    <td>
                                        <?php
                                            if($reminder->status==1) {
                                                echo "فعال";
                                            } elseif($reminder->status==0) {
                                                echo "غير فعال";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/admin/reminders/<?=$reminder->id;?>" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/reminders/<?=$reminder->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/reminders/<?=$reminder->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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
