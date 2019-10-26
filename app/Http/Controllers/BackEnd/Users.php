<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المستخدم',
            'sModuleName' => 'مستخدم',
            'pageTitle' => 'المستخدمين',
        ];
        return $array;
    }

    public function store(Store $request){
        $requestArray = $request->all();
        $requestArray['password'] =  Hash::make($requestArray['password']);
        $this->model->create($requestArray);

        return response()->json(['success'=>'تم إضافة المستخدم بنجاح']);
        //return redirect()->route('users.index');
    }

    public function update($id , Update $request){
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        $row->update($requestArray);

        return response()->json(['success'=>'تم تحديث المستخدم بنجاح']);
        //return redirect()->route('users.index');
    }

	//////////////
    public function serchUser(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $users = User::where('id', '=', $text)
            ->orWhere('name', '=', $text)
            ->orWhere('email', '=', $text)
            ->orWhere('mobile', '=', $text)
            ->orWhere('group', '=', $text)
            ->get();
        } elseif($text=="") {
            $users = User::get();
        }

						if($users !="[]") {
                            foreach ($users as $user) {
							?>
                                <tr class="gradeX">
                                    <td><?=$user->id ; ?></td>
                                    <td><?=$user->name ; ?></td>
                                    <td><?=$user->email ; ?></td>
                                    <td><?=$user->mobile ; ?></td>
                                    <td><?=$user->group ; ?></td>
                                    <td>
                                        <a href="/admin/users/<?=$user->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if($user->group != 'admin') { ?>
                                        <form action="/admin/users/<?=$user->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
                                            <?=csrf_field(); ?>
                                            <?=method_field('delete'); ?>
                                            <a class="btn btn-white btn-link btn-sm">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </form>
                                        <?php } ?>
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
