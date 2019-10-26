<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Export_reminders\Store;
use App\Models\Export_reminder;

class Export_reminders extends BackEndController
{

    public function __construct(Export_reminder $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['export'];
    }

    protected function append()
    {
        $array =  [
            'moduleName' => 'المرفق',
            'sModuleName' => 'مرفق',
            'pageTitle' => 'المرفقات',
            'rows' => Export_reminder::get(),
        ];
        return $array;
    }

    public function store(Store $request){
      $check = Export_reminder::where('export_id', $request->export_id)->count();
      if($check<4) {
          $col = array();
        if (isset($request->reminder1) && !empty($request->reminder1)) {
            $requestArray1 =  ['type' => $request->type1, 'user_id' => $request->user1, 'datetime' => $request->datetime1, 'export_id' => $request->export_id];
            $row = Export_reminder::create($requestArray1);
            $col1='<tr>
            <td>
            '.$row->id.'
            </td>
            <td>
                '.$row->type.'
            </td>
            <td>
                '.$row->date.'
            </td>
            <td>
                '.$row->time.'
            </td>
            <td>
            '.$row->user->name.'
            </td>
            <td class="td-actions text-right">

                <form action="'.route('export_reminders.destroy' , ['id' => $row->id]).'" class="delete-confirmation" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </form>
            </td>
            </tr>';        
            array_push($col, $col1);
        }

        if (isset($request->reminder2) && !empty($request->reminder2)) {
            $requestArray2 =  ['type' => $request->type2, 'user_id' => $request->user2, 'datetime' => $request->datetime2, 'export_id' => $request->export_id];
            $row = Export_reminder::create($requestArray2);
            $col2='<tr>
            <td>
            '.$row->id.'
            </td>
            <td>
                '.$row->type.'
            </td>
            <td>
                '.$row->date.'
            </td>
            <td>
                '.$row->time.'
            </td>
            <td>
            '.$row->user->name.'
            </td>
            <td class="td-actions text-right">

                <form action="'.route('export_reminders.destroy' , ['id' => $row->id]).'" class="delete-confirmation" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </form>
            </td>
            </tr>';        
            array_push($col, $col2);
        }

        if (isset($request->reminder3) && !empty($request->reminder3)) {
            $requestArray3 =  ['type' => $request->type3, 'user_id' => $request->user3, 'datetime' => $request->datetime3, 'export_id' => $request->export_id];
            $row = Export_reminder::create($requestArray3);
            $col3='<tr>
            <td>
            '.$row->id.'
            </td>
            <td>
                '.$row->type.'
            </td>
            <td>
                '.$row->date.'
            </td>
            <td>
                '.$row->time.'
            </td>
            <td>
            '.$row->user->name.'
            </td>
            <td class="td-actions text-right">

                <form action="'.route('export_reminders.destroy' , ['id' => $row->id]).'" class="delete-confirmation" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </form>
            </td>
            </tr>';        
            array_push($col, $col1);
        }

        if (isset($request->reminder4) && !empty($request->reminder4)) {
            $requestArray4 =  ['type' => $request->type4, 'user_id' => $request->user4, 'datetime' => $request->datetime4, 'export_id' => $request->export_id];
            $row = Export_reminder::create($requestArray4);
            $col4='<tr>
            <td>
            '.$row->id.'
            </td>
            <td>
                '.$row->type.'
            </td>
            <td>
                '.$row->date.'
            </td>
            <td>
                '.$row->time.'
            </td>
            <td>
            '.$row->user->name.'
            </td>
            <td class="td-actions text-right">

                <form action="'.route('export_reminders.destroy' , ['id' => $row->id]).'" class="delete-confirmation" method="post">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </a>
                </form>
            </td>
            </tr>';        
            array_push($col, $col1);
        }
            return response()->json(['success'=>'تم إضافة التذكيرات بنجاح', 'col'=>$col]);
      } else {
            return response()->json(['success'=>'غير مسموح بإضافة أكثر من 4 تذكيرات']);
      }
    }

    public function update($id , Store $request){
        $row = $this->model->FindOrFail($id);
        $array['desc'] = $request->desc;
        if($request->file != null){
            $array['file'] = $request->file;
        }
        $row->update($array);

        return redirect()->route('exports.show', ['id'=>$row->export_id]);
        //return redirect()->route('sub_categories.edit' , ['id' => $row->id]);
    }
}

