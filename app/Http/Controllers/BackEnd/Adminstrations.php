<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Adminstrations\Store;
use App\Models\Adminstration;

class Adminstrations extends BackEndController
{

    public function __construct(Adminstration $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['departments'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'الإدارة',
            'sModuleName' => 'إدارة',
            'pageTitle' => 'الإدارات',
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return response()->json(['success'=>'تم إضافة الإدارة بنجاح']);
        //return redirect()->route('adminstrations.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return response()->json(['success'=>'تم تحديث الإدارة بنجاح']);
        //return redirect()->route('adminstrations.index');
    }

	//////////////
    public function serchAdminstration(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $adminstrations = Adminstration::where('id', '=', $text)
            ->orWhere('name', '=', $text)
            ->get();
        } elseif($text=="") {
            $adminstrations = Adminstration::get();
        }

						if($adminstrations !="[]") {
                            foreach ($adminstrations as $adminstration) {
							?>
                                <tr class="gradeX">
                                    <td><?=$adminstration->id ; ?></td>
                                    <td><?=$adminstration->name ; ?></td>
                                    <td>
                                        <a href="/admin/departments/admin/<?=$adminstration->id; ?>" class="btn btn-white btn-round">
                                            <?=$adminstration->departments->count() ; ?>
                                        </a>                                       
                                    </td>
                                    <td>
                                        <a href="/admin/adminstrations/<?=$adminstration->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/adminstrations/<?=$adminstration->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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

