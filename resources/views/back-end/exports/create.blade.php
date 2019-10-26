@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="panel panel-widget">
        <div class="row" style="margin:0">
            <div class="col-md-4" style="background-color: #2ba88a;text-align: center;padding: 15px;">
                <h3 style="color:#fff !important; text-align: center;"> البيانات الرئيسية</h3>
            </div>
            <div class="col-md-4" style="background-image: url(/assets/images/banerErgit.png);background-repeat: repeat-x;background-size: contain; height: 56px;">
            </div>
        </div>
        <div style="border: 1px solid;padding: 9px;">
            <form action="{{ route($routeName.'.store') }}" method="POST" id="create_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('back-end.'.$folderName.'.form_data')
                <button type="submit" id="submit_btn" class="btn btn-primary pull-right">حفظ</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {       
      $('#create_form').submit(function (e) {
          e.preventDefault();
          $('#submit_btn').html('Processing..');
		  $('#submit_btn').prop('disabled', true); 
          $('.invalid-feedback').html('');
          $('#success').html('');
      
          var formData = new FormData(this);
          $.ajax({
            url: "{{ route($routeName.'.store') }}",
            type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
            success: function (data) {
       
                swal("Good job!", data.success, "success");
                window.location.href='/admin/exports/'+data.id+'/edit/';
                $('#create_form').trigger("reset");
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('حفظ');
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('حفظ');
            }
        });
      });

    });
  </script>

@endsection
