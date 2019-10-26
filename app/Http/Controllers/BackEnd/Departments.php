<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Departments\Store;
use App\Models\Department;
use App\Models\Adminstration;

class Departments extends BackEndController
{

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['admin'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'القسم',
            'sModuleName' => 'قسم',
            'pageTitle' => 'الأقسام',
            'adminstrations' => Adminstration::get(),
        ];
        return $array;
    }

    public function get($id)
    {
        $adminstration = Adminstration::findOrFail($id);
        $rows = Department::where('admin_id', $adminstration->id);
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        $array =  [
            'moduleName' => 'القسم',
            'sModuleName' => 'قسم',
            'pageTitle' => 'الأقسام',
            'rows' => $rows,
            'routeName' => 'departments',
            'adminstration' => $adminstration ,
        ];

        return view('back-end.' . $this->getClassNameFromModel() . '.index')->with($array);
    }

    public function getDepts($id)
    {
        $cat = Adminstration::findOrFail($id);
        $rows = Department::where('admin_id', $id)->get();
        if($id) {
            foreach($rows as $row) { ?>
                <option value="<?=$row->id;?>" ><?=$row->name;?></option>
            <?php
            }
        } else {
            echo '<option value="">اختر القسم</option>';
        }
        
    }

    public function createSub($id)
    {
        $parent = Adminstration::findOrFail($id);
        $array =  [
            'moduleName' => 'القسم',
            'sModuleName' => 'قسم',
            'pageTitle' => 'الأقسام',
            'routeName' => 'departments' ,
            'folderName' => 'departments' ,
            'parent' => $parent ,
        ];

        return view('back-end.departments.create')->with($array);
    }

    public function store(Store $request){
        $row = $this->model->create($request->all());

        return response()->json(['success'=>'تم إضافة القسم بنجاح']);
        //return redirect()->route('departments.admin', ['id' => $row->admin_id]);
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array = ['name' => $request->name];
        $row->update($array);

        return response()->json(['success'=>'تم تحديث القسم بنجاح']);
        //return redirect()->route('departments.admin', ['id' => $row->admin_id]);
    }
}

