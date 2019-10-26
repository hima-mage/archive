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
                                            رقم الألبوم
                                        </th>
                                        <td>
                                            {{ $row->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            اسم الألبوم
                                        </th>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            تاريخ الفعالية
                                        </th>
                                        <td>
                                             {{ $row->date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            مكان الفعالية
                                        </th>
                                        <td>
                                           {{ $row->location }}
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
                                            المدرسة
                                        </th>
                                        <td>
                                           {{ $row->dept->school }}
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
                                            <!--th>
                                                الموضوع
                                            </th-->
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
                                            <!--td>
                                               {{ $attachment->desc }}
                                            </td-->
                                            <td>
                                               <a href="/uploads/albums/{{ $attachment->file }}" target="_blank">تحميل</a>
                                           </td>
                                            <td class="td-actions text-right">
                                                <!--a href="{{ route($routeName.'.edit' , ['id' => $attachment->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                                    <i class="fa fa-edit"></i>
                                                </a-->
                                                                                                
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