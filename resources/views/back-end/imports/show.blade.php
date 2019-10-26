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
                <div class="col-md-5"> <label>   رقم الوارد </label></div>
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5"><label>رقم الصادر من الجهة الخارجية </label> </div>
                <div class="col-md-7"> 
                    <input type="number" value="{{ $row->export_number }}" class="form-control" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-5"><label>تاريخ  الاستلام </label> </div>
                <div class="col-md-7"> 
                    <input type="text" value="{{ $row->recieve_date }}" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off" disabled>
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5"><label>تاريخ  الكتاب </label> </div>
                <div class="col-md-7"> 
                    @php $input = "date"; @endphp
                    <input type="text" name="{{ $input }}" id="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                        placeholder="MM/DD/YYYY" class="form-control" autocomplete="off" disabled>
                </div>
            </div>

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
                <div class="col-md-3"><label>وارد من </label> </div>
                <div class="col-md-9">
                    @php $input = "from_category"; @endphp
                    <select class="form-control" disabled >
                            <option value="{{ $row->from_category }}">{{ $row->from_cat->name }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>وارد من </label> </div>
                <div class="col-md-9">
                    @php $input = "from_sub_category"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->from_sub_category }}">{{ $row->from_sub_cat->name }}</option>
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
                        <option value="{{ $row->from_sub_category }}" >{{ $row->sub_cat->name }}</option>
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
                <div class="col-md-3"><label>تذكير</label></div>
                <div class="col-md-9">
                    @php $input = "remind"; @endphp
                    <select class="form-control" disabled >
                        <option value="{{ $row->remind }}" >{{ $row->remind }}</option>
                    </select>
 
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3"><label>الرقم أو البريد</label> </div>
                <div class="col-md-9">
                    @php $input = "remind_to"; @endphp
                    <input type="text" value="{{ $row->remind_to }}" class="form-control" disabled />
 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3"><label>الكتاب الرئيسي</label></div>
                <div class="col-md-9">
                    <a href="/uploads/imports/{{ $row->main_file }}" target="_blank">تحميل</a> 
                </div>
            </div>
        </div>
        

    <div class="wrapper wrapper-content animated fadeInRight">
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
                                               <a href="/uploads/exports/{{ $attachment->file }}" target="_blank">تحميل</a>
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