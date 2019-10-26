@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{"تعديل " . $moduleName}}</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.update' , ['id' => $row->id]) }}" id="edit_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            @include('back-end.'.$folderName.'.form_data')
            <button type="submit" id="submit_btn" class="btn btn-primary pull-right">تحديث {{ $moduleName }}</button>
            <a href="{{ route($routeName.'.create') }}" class="btn btn-primary">إضافة {{ $sModuleName }} جديد</a>
            <div class="clearfix"></div>
        </form>
    </div>
    <div class="progressbar-heading grids-heading">
        <h2>تحميل الكتاب الرئيسي</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.update' , ['id' => $row->id]) }}" id="edit_form_main_file" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            @include('back-end.'.$folderName.'.form_main_file')
            <button type="submit" id="submit_btn_main_file" class="btn btn-primary pull-right">حفظ</button>
            <div id="man_file_link">
            @if($row->main_file !="")
                <a href="/public/uploads/exports/{{ $row->main_file }}" target="_blank">عرض</a>
            @endif
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
    <div class="progressbar-heading grids-heading">
        <h2>إضافة مرفقات</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route('export_attachments.store') }}" method="POST" id="store_attachments" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('back-end.'.$folderName.'.form_attachments')
            <input type="hidden" name="export_id" id="export_id" value="{{ $row->id }}">
            <button type="submit" id="submit_btn_attachments" class="btn btn-primary pull-right">حفظ</button>
            <div class="clearfix"></div>
        </form>
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
                <tbody id="attaches_tbody">
                    @foreach ($row->attaches as $attachment)
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
                            <!--a href="{{ route('export_attachments.edit' , ['id' => $attachment->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                <i class="fa fa-edit"></i>
                            </a-->
                                                                            
                            <form action="{{ route('export_attachments.destroy' , ['id' => $attachment->id]) }}" class="delete-confirmation" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a class="btn btn-white btn-link btn-sm" data-original-title="Remove">
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
    <div class="progressbar-heading grids-heading">
        <h2>إضافة التذكيرات</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route('export_reminders.store') }}" method="POST" id="store_reminder" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('back-end.'.$folderName.'.form_reminders')
            <input type="hidden" name="export_id" id="export_id" value="{{ $row->id }}">
            <button type="submit" id="submit_btn_reminders" class="btn btn-primary pull-right">حفظ</button>
            <div class="clearfix"></div>
        </form>

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
                                المستخدم
                            </th>
                            <th>
                                الإجراء
                            </th>
                        </tr>
                    </thead>
                    <tbody id="reminders_tbody">
                        @foreach ($row->reminders as $reminder)
                        <tr>
                            <td>
                               {{ $reminder->id }}
                            </td>
                            <td>
                                {{ $reminder->type }}
                            </td>
                            <td>
                                {{ $reminder->datetime }}
                            </td>
                            <td>
                                {{ $reminder->user->name }}
                            </td>
                            <td class="td-actions text-right">
                                <!--a href="{{ route('export_reminders.edit' , ['id' => $reminder->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                    <i class="fa fa-edit"></i>
                                </a-->
                                                                                
                                <form action="{{ route('export_reminders.destroy' , ['id' => $reminder->id]) }}" class="delete-confirmation" method="post">
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
<script type="text/javascript">
    $(document).ready(function() {

      $('#edit_form').submit(function (e) {
          e.preventDefault();
          $('#submit_btn').html('Processing..');
		  $('#submit_btn').prop('disabled', true); 
          $('#edit_form .invalid-feedback').html('');
      
          var formData = new FormData(this);
          $.ajax({
            url: "{{ route($routeName.'.update' , ['id' => $row]) }}",
            type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
            success: function (data) {
       
                swal("Good job!", data.success, "success");

                $('#edit_form').trigger("reset");
                
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('حفظ');
           
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('تحديث {{ $moduleName }}');
            }
        });
      });

      $('#edit_form_main_file').submit(function (e) {
          e.preventDefault();
          $('#submit_btn_main_file').html('Processing..');
		  $('#submit_btn_main_file').prop('disabled', true); 
          $('#edit_form_main_file .invalid-feedback').html('');
      
          var formData = new FormData(this);
          $.ajax({
            url: "{{ route($routeName.'.update' , ['id' => $row]) }}",
            type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
            success: function (data) {
       
                swal("Good job!", data.success, "success");
                $('#man_file_link').html('<a href="/public/uploads/exports/'+data.link+'" target="_blank">عرض</a>');

                $('#edit_form_main_file').trigger("reset");
                
				$('#submit_btn_main_file').prop('disabled', false); 
                $('#submit_btn_main_file').html('حفظ');
           
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn_main_file').prop('disabled', false); 
                $('#submit_btn_main_file').html('تحديث {{ $moduleName }}');
            }
        });
      });
                  
      $('#store_attachments').submit(function (e) {
          e.preventDefault();
          $('#submit_btn_attachments').html('Processing..');
		  $('#submit_btn_attachments').prop('disabled', true); 
          $('#store_attachments .invalid-feedback').html('');
      
          var formData = new FormData(this);
          $.ajax({
            url: "{{ route('export_attachments.store') }}",
            type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
            success: function (data) {
       
                swal("Good job!", data.success, "success");
                $('#attaches_tbody').append(data.col);
                $('#store_attachments').trigger("reset");
				$('#submit_btn_attachments').prop('disabled', false); 
                $('#submit_btn_attachments').html('حفظ');

                //$('.add_more').show();
                //$('#checker').val('1');
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn_attachments').prop('disabled', false); 
                $('#submit_btn_attachments').html('حفظ');
            }
          });
      });
            
      $('#store_reminder').submit(function (e) {
          e.preventDefault();
          $('#submit_btn_reminders').html('Processing..');
		  $('#submit_btn_reminders').prop('disabled', true); 
          $('#store_reminder .invalid-feedback').html('');
      
          $.ajax({
            url: "{{ route('export_reminders.store') }}",
            type: "POST",
			data: $('#store_reminder').serialize(),
            success: function (data) {
       
                if(data.success=="تم إضافة التذكيرات بنجاح") {
                    swal("Good job!", data.success, "success");
                } else {
                    swal("عذرا!", data.success, "warning");
                }
                $('#reminders_tbody').append(data.col);

                $('#store_reminder').trigger("reset");
				$('#submit_btn_reminders').prop('disabled', false); 
                $('#submit_btn_reminders').html('حفظ');
           
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn_reminders').prop('disabled', false); 
                $('#submit_btn_reminders').html('حفظ');
            }
          });
      });

    });
  </script>

@endsection
