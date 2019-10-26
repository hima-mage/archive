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
        <form action="{{ route($routeName.'.update' , ['id' => $row]) }}" id="edit_form" method="POST">
            {{ method_field('put') }}
            @include('back-end.'.$folderName.'.form')
            <button type="submit" id="submit_btn" class="btn btn-primary pull-right">تحديث {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
                 
      $('#edit_form').submit(function (e) {
          e.preventDefault();
          $('#submit_btn').html('Processing..');
		  $('#submit_btn').prop('disabled', true); 
          $('.invalid-feedback').html('');
          $('#success').html('');
      
          $.ajax({
            data: $('#edit_form').serialize(),
            url: "{{ route($routeName.'.update' , ['id' => $row]) }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
       
                swal("Good job!", data.success, "success");   

                $('#edit_form').trigger("reset");
    			$('#submit_btn').prop('disabled', false); 
				$('#submit_btn').prop('disabled', false); 
                $('#submit_btn').html('تحديث {{ $moduleName }}');
           
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

    });
  </script>

@endsection
