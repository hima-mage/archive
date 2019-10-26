@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{"إضافة " . $sModuleName}}</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.store') }}" method="POST" id="create_form" enctype="multipart/form-data">
            @include('back-end.'.$folderName.'.form')
            <button type="submit" id="submit_btn" class="btn btn-primary pull-right">إضافة {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
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

                $('#create_form').trigger("reset");
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('إضافة {{ $moduleName }}');
           
            },
            error: function (request, status, error) {
                $.each(request.responseJSON.errors, function(key,value) {
                    $('.'+key+'_error').html(value);
                });
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('إضافة {{ $moduleName }}');
            }
        });
      });

    });
  </script>

@endsection
