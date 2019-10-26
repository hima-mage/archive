@extends('back-end.layout.app')

@section('title')
    
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{$pageTitle}}</h2>
    </div>
    <div class="panel panel-widget">
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-5"> <label>   رقم الصادر </label></div>
                <div class="col-md-7">
                    <input type="text" class="form-control" disabled value="{{ $row->id }}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-5"><label>تاريخ  اليوم </label> </div>
                <div class="col-md-7">
                        <input type="text" class="form-control" disabled value="{{ date('Y-m-d') }}" />
                    </div>
                </div>
            <div class="col-md-4">
                 <div class="col-md-5"><label>تاريخ  الكتاب </label> </div>
                <div class="col-md-7"> 
                    @php $input = "date"; @endphp
                    <input type="text" value="{{ $row->date }}"
                        placeholder="MM/DD/YYYY" class="form-control" disabled autocomplete="off">
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>اسم الملف</label></div>
                <div class="col-md-9">
                    @php $input = "name"; @endphp
                    <input type="text" class="form-control" disabled value="{{ $row->name }}" />
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>صادر إلى </label> </div>
                <div class="col-md-9">
                    @php $input = "to_category"; @endphp
                    <select class="form-control" disabled >
                            <option value="{{ $row->to_category }}">{{ $row->to_cat->name }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>صادر إلى </label> </div>
                <div class="col-md-9">
                    @php $input = "to_sub_category"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->to_sub_category }}">{{ $row->to_sub_cat->name }}</option>
                    </select>
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>التصنيف</label></div>
                <div class="col-md-9">
                    @php $input = "category"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->category }}" >{{ $row->cat->name }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>التصنيف الفرعي</label> </div>
                <div class="col-md-9">
                    @php $input = "sub_category"; @endphp
                    <select class="form-control" disabled>
                        <option value="{{ $row->to_sub_category }}" >{{ $row->sub_cat->name }}</option>
                    </select>
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>الإدارة</label></div>
                <div class="col-md-9">
                    @php $input = "adminstration"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->adminstration }}" >{{ $row->admin->name }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>القسم </label> </div>
                <div class="col-md-9">
                    @php $input = "department"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->department }}" >{{ $row->dept->name }}</option>
                    </select>
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>حالة المتابعة</label></div>
                    <div class="col-md-9">
                        @php $input = "follow_status"; @endphp
                        <select class="form-control" disabled >
                        <option value="{{ $row->follow_status }}" >{{ $row->follow_status }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>تاريخ المتابعة </label> </div>
                <div class="col-md-9">
                    @php $input = "follow_date"; @endphp
                    <input type="text" value="{{ $row->follow_date }}"
                        placeholder="MM/DD/YYYY" class="form-control" disabled autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>درجة الأهمية</label></div>
                    <div class="col-md-9">
                        @php $input = "priority"; @endphp
                        <select class="form-control" disabled >
                        <option value="{{ $row->priority }}" >
                            @if($row->priority==1) 
                            {{ 'هام' }} 
                        @elseif($row->priority==2) 
                            {{ 'هام جدا' }} 
                        @elseif($row->priority==3) 
                            {{ 'شديد الأهمية' }} 
                        @endif
                        </option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>درجة السرية</label></div>
                    <div class="col-md-9">
                        @php $input = "confidentiality"; @endphp
                        <select class="form-control" disabled >
                        <option value="{{ $row->confidentiality }}">
                            @if($row->confidentiality==1) 
                            {{ 'سري' }} 
                        @elseif($row->confidentiality==2) 
                            {{ 'سري جدا' }} 
                        @elseif($row->confidentiality==3) 
                            {{ 'شديد السرية' }} 
                        @endif
                        </option>
                    </select>
 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>الكتاب الرئيسي</label></div>
                <div class="col-md-9">
                    @if($row->main_file!="")
                    <a href="/public/uploads/exports/{{ $row->main_file }}" target="_blank">تحميل</a> 
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        <div class="table-responsive">
                                <br><br><center><h2>المرفقات</h2></center>

                                <table class="table">
                                    </thead>
                                        <tr>
                                            <th>
                                                رقم المرفق
                                            </th>
                                            <th>
                                                موضوع المرفق
                                            </th>
                                            <th>
                                                عرض
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
                                               <a href="/public/uploads/exports/{{ $attachment->file }}" target="_blank">عرض</a>
                                           </td>
                                            <td class="td-actions text-right">
                                                <!--a href="{{ route($attachmentRouteName.'.edit' , ['id' => $attachment->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                                    <i class="fa fa-edit"></i>
                                                </a-->
                                                                                                
                                                <form action="{{ route($attachmentRouteName.'.destroy' , ['id' => $attachment->id]) }}" class="delete-confirmation" method="post">
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

        
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        <div class="table-responsive">
                                <br><br><center><h2>التذكيرات</h2></center>

                                <table class="table">
                                    </thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                طريقة التذكير 
                                            </th>
                                            <th>
                                                التاريخ
                                            </th>
                                            <th>
                                                التوقيت
                                            </th>
                                            <th>
                                                المستخدم
                                            </th>
                                            <th>
                                                الإجراء
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reminders as $reminder)
                                        <tr>
                                            <td>
                                               {{ $reminder->id }}
                                            </td>
                                            <td>
                                                {{ $reminder->type }}
                                            </td>
                                            <td>
                                                {{ $reminder->date }}
                                            </td>
                                            <td>
                                                {{ $reminder->time }}
                                            </td>
                                            <td>
                                                {{ $reminder->user->name }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <!--a href="{{ route($reminderRouteName.'.edit' , ['id' => $reminder->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                                    <i class="fa fa-edit"></i>
                                                </a-->
                                                                                                
                                                <form action="{{ route($reminderRouteName.'.destroy' , ['id' => $reminder->id]) }}" class="delete-confirmation" method="post">
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
@endsection