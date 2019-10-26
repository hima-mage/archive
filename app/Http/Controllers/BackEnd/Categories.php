<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;

class Categories extends BackEndController
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['sub_categories'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'التصنيف الرئيسي',
            'sModuleName' => 'تصنيف رئيسي',
            'pageTitle' => 'التصنيفات الرئيسية',
        ];
        return $array;
    }

    public function store(Store $request){
        $this->model->create($request->all());

        return response()->json(['success'=>'تم إضافة التصنيف بنجاح']);
        //return redirect()->route('categories.index');
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $row->update($request->all());

        return response()->json(['success'=>'تم تحديث التصنيف بنجاح']);
        //return redirect()->route('categories.index');
    }

	//////////////
    public function serchCategory(){
        $text=trim(request()->text);
        if(!empty($text)) {
            $categories = Category::where('id', '=', $text)
            ->orWhere('name', '=', $text)
            ->get();
        } elseif($text=="") {
            $categories = Category::get();
        }

						if($categories !="[]") {
                            foreach ($categories as $category) {
							?>
                                <tr class="gradeX">
                                    <td><?=$category->id ; ?></td>
                                    <td><?=$category->name ; ?></td>
                                    <td>
                                        <a href="/admin/sub_categories/cat/<?=$category->id; ?>" class="btn btn-white btn-round">
                                            <?=$category->sub_categories->count() ; ?>
                                        </a>                                       
                                    </td>
                                    <td>
                                        <a href="/admin/categories/<?=$category->id;?>/edit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" style="float: right">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="/admin/categories/<?=$category->id;?>" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
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

