<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Sub_categories\Store;
use App\Models\Sub_category;
use App\Models\Category;

class Sub_categories extends BackEndController
{

    public function __construct(Sub_category $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'التصنيف الفرعي',
            'sModuleName' => 'تصنيف فرعي',
            'pageTitle' => 'التصنيفات الفرعية',
            'categories' => Category::get(),
        ];
        return $array;
    }

    public function get($id)
    {
        $cat = Category::findOrFail($id);
        $rows = Sub_category::where('cat_id', $cat->id);
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        $array =  [
            'moduleName' => 'التصنيف الفرعي',
            'sModuleName' => 'تصنيف فرعي',
            'pageTitle' => 'التصنيفات الفرعية',
            'rows' => $rows,
            'routeName' => 'sub_categories',
            'cat' => $cat ,
        ];

        return view('back-end.' . $this->getClassNameFromModel() . '.index')->with($array);
    }

    public function getSub($id)
    {
        $cat = Category::findOrFail($id);
        $rows = Sub_category::where('cat_id', $id)->get();
        if($id) {
            foreach($rows as $row) { ?>
                <option value="<?=$row->id;?>" ><?=$row->name;?></option>
            <?php
            }
        } else {
            echo'<option value="" >اختر التصنيف الفرعي</option>';
        }
    }

    public function createSub($id)
    {
        $parent = Category::findOrFail($id);
        $array =  [
            'moduleName' => 'التصنيف الفرعي',
            'sModuleName' => 'تصنيف فرعي',
            'pageTitle' => 'التصنيفات الفرعية',
            'routeName' => 'sub_categories' ,
            'folderName' => 'sub_categories' ,
            'parent' => $parent ,
        ];

        return view('back-end.sub_categories.create')->with($array);
    }

    public function store(Store $request){
        $row = $this->model->create($request->all());

        return response()->json(['success'=>'تم إضافة التصنيف الفرعي بنجاح']);
        //return redirect()->route('sub_categories.cat', ['id' => $row->cat_id]);
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return response()->json(['success'=>'تم تحديث التصنيف الفرعي بنجاح']);
        //return redirect()->route('sub_categories.cat', ['id' => $row->cat_id]);
    }
}

