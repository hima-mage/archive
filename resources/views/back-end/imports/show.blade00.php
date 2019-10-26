@extends('back-end.layout.app')

@section('title')
    
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{$pageTitle}}</h2>
    </div>
    <div class="panel panel-widget">

    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>
                                            رقم الوارد
                                        </th>
                                        <td>
                                            {{ $row->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            اسم الملف
                                        </th>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            تاريخ الكتاب
                                        </th>
                                        <td>
                                             {{ $row->date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            وارد من
                                        </th>
                                        <td>
                                           {{ $row->from_cat->name }}
                                       </td>
                                       </tr>
                                    <tr>
                                        <th>
                                            وارد من
                                        </th>
                                        <td>
                                           {{ $row->from_sub_cat->name }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            التصنيف
                                        </th>
                                        <td>
                                           {{ $row->cat->name }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            التصنيف الفرعي
                                        </th>
                                        <td>
                                           {{ $row->sub_cat->sub_category }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            الإدارة
                                        </th>
                                        <td>
                                           {{ $row->admin->name }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            القسم
                                        </th>
                                        <td>
                                           {{ $row->dept->name }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            درجة الأهمية
                                        </th>
                                        <td>
                                           @if($row->priority==1) 
                                                {{ 'هام' }} 
                                            @elseif($row->priority==2) 
                                                {{ 'هام جدا' }} 
                                            @elseif($row->priority==3) 
                                                {{ 'شديد الأهمية' }} 
                                            @endif
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            درجة السرية
                                        </th>
                                        <td>
                                           @if($row->confidentiality==1) 
                                                {{ 'سري' }} 
                                            @elseif($row->confidentiality==2) 
                                                {{ 'سري جدا' }} 
                                            @elseif($row->confidentiality==3) 
                                                {{ 'شديد السرية' }} 
                                            @endif
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            حالة المتابعة
                                        </th>
                                        <td>
                                           {{ $row->follow_status }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            تاريخ المتابعة
                                        </th>
                                        <td>
                                           {{ $row->follow_date }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            تذكير
                                        </th>
                                        <td>
                                           {{ $row->remind }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            الرقم أو البريد
                                        </th>
                                        <td>
                                           {{ $row->remind_to }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            الكتاب الرئيسي
                                        </th>
                                        <td>
                                           <a href="/uploads/exports/{{ $row->main_file }}" target="_blank">تحميل</a>
                                       </td>
                                    </tr>
                                </table>
                                
                                <br><br><center><h2>المرفقات</h2></center>

                                <table class="table">
                                    </thead>
                                        <tr>
                                            <th>
                                                رقم المرفق
                                            </th>
                                            <th>
                                                الموضوع
                                            </th>
                                            <th>
                                                تحميل
                                            </th>
                                            <th>
                                                الإجراء
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attachments as $attachment)
                                        <tr>
                                            <td>
                                               {{ $attachment->id }}
                                            </td>
                                            <td>
                                               {{ $attachment->desc }}
                                            </td>
                                            <td>
                                               <a href="/uploads/exports/{{ $attachment->file }}" target="_blank">تحميل</a>
                                           </td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route($routeName.'.edit' , ['id' => $attachment->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                                                                
                                                <form action="{{ route($routeName.'.destroy' , ['id' => $attachment->id]) }}" class="delete-confirmation" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $sModuleName }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection