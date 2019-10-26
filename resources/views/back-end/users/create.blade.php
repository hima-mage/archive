@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{$pageTitle}}</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.store') }}" id="create_form" method="POST">
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
      
          $.ajax({
            data: $(this).serialize(),
            url: "{{ route($routeName.'.store') }}",
            type: "POST",
            dataType: 'json',
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
