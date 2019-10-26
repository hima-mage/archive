{{ csrf_field() }}
<div class="row">
    <div class="col-md-4">
        <div class="col-md-5"> <label>   رقم مسلسل </label></div>
        <div class="col-md-7"><label class="outborder">{{ $reminder_number !="" ? $reminder_number->id+1 : 1 }}</label></div>
    </div>
    <div class="col-md-4">
        <div class="col-md-5"><label>تاريخ  اليوم </label> </div>
        <div class="col-md-7"><label class="outborder">{{ date('Y-m-d') }}</label></div>
    </div>
    <div class="col-md-4">
         <div class="col-md-5"><label>تاريخ  التذكير </label> </div>
        <div class="col-md-7"> 
            @php $input = "date"; @endphp
            <input type="text" name="{{ $input }}" id="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>التصنيف</label></div>
        <div class="col-md-9">
            @php $input = "category"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر التصنيف</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ isset($row) && $category->id == $row->cat->id ? "selected" : "" }} >{{$category->name}}</option>
                @endforeach
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>التصنيف الفرعي</label> </div>
        <div class="col-md-9">
            @php $input = "sub_category"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر التصنيف الفرعي</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <?php if(isset($row)) { ?>
        <script>
            $(document).ready(function() {
                $(window).load(function() {
                    setTimeout(function(){
                        $('#sub_category option[value="<?php echo $row->sub_category; ?>"]').prop('selected', true).change();
                    }, 1000);
                });
            });
        </script>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>الرسالة</label></div>
            <div class="col-md-9">
                @php $input = "message"; @endphp
                <textarea  name="{{ $input }}" id="{{ $input }}" class="form-control" ></textarea>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>الحالة</label></div>
        <div class="col-md-9">
            @php $input = "status"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value=""></option>
                <option value="0" {{ isset($row) && $row->status == "0" ? "selected" : "" }}>فعال</option>
                <option value="1" {{ isset($row) && $row->status == "1" ? "selected" : "" }}>غير فعال</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 centerz">
        <button type="button" class="btn btn_5 btn-lg btn-default add_more">إضافة تاريخ تذكير</button>
    </div>
</div>


<div class="row">
<div class="col-md-12 ">
    <div id="multiple_attches_div"></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>تواريخ التذكير</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="col-md-7"><input type="text" name="dates[]" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off" value="" style="float: right"/></div>
            </td>
        </tr>
    </tbody>
</table>
<span class="{{ 'dates_error' }} invalid-feedback" role="alert"></span>
</div>
</div>


<?php if(isset($row)) { ?>
    <script>
        $(document).ready(function() {
         //on load
         $(window).load(function() {
            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/sub_categories/catSub/'+$('#to_category').val(),
                success: function(response) {
                    $('#to_sub_category').html(response);
                }
            });

            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/sub_categories/catSub/'+$('#category').val(),
                success: function(response) {
                    $('#sub_category').html(response);
                }
            });

            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/departments/adminDepts/'+$('#adminstration').val(),
                success: function(response) {
                    $('#department').html(response);
                }
            });
        });
         /////////
        });
    </script>
<?php } ?>

<script>
    $(document).ready(function() {
        //get to_departments of selected to_adminstration
        $('#to_category').change(function() {
            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/sub_categories/catSub/'+$(this).val(),
                success: function(response) {
                    $('#to_sub_category').html(response);
                }
            });
        });

        //get sub cateories of selected category
        $('#category').change(function() {
            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/sub_categories/catSub/'+$(this).val(),
                success: function(response) {
                    $('#sub_category').html(response);
                }
            });
        });

        //get departments of selected adminstration
        $('#adminstration').change(function() {
            $.ajax({
                method: 'get',
                data:'',
                url: '/admin/departments/adminDepts/'+$(this).val(),
                success: function(response) {
                    $('#department').html(response);
                }
            });
        });

    });


    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_more'); //Add button selector
    var wrapper = $('tbody'); //Input field wrapper
    var fieldHTML = '<tr><td><div class="col-md-7"><input type="text" name="dates[]" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off" value="" style="float: right"/></div><button type="button" class="btn btn-sm btn-danger remove_button" onclick="javascript:void(0);">حذف</button></td></tr>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('td').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

</script>
<!--//grids-->
