{{ csrf_field() }}
<div class="row">
    <div class="col-md-4">
        <div class="col-md-5"> <label>   رقم مسلسل </label></div>
        <div class="col-md-7"><label class="outborder">{{ $general_number !="" ? $general_number->id+1 : 1 }}</label></div>
    </div>
    <div class="col-md-4">
        <div class="col-md-5"><label>تاريخ  اليوم </label> </div>
        <div class="col-md-7"><label class="outborder">{{ date('Y-m-d') }}</label></div>
    </div>
    <div class="col-md-4">
         <div class="col-md-5"><label>تاريخ  الكتاب </label> </div>
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
        <div class="col-md-3"><label>اسم الملف</label></div>
        <div class="col-md-9">
            @php $input = "name"; @endphp
            <input type="text"  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row) ? $row->{$input} : old($input) }}" />
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>صادر إلى </label> </div>
        <div class="col-md-9">
            @php $input = "to_category"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر التصنيف</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ isset($row) && $category->id == $row->to_cat->id ? "selected" : "" }}>{{$category->name}}</option>
                @endforeach
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>صادر إلى </label> </div>
        <div class="col-md-9">
            @php $input = "to_sub_category"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
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
                    $('#to_sub_category option[value="<?php echo $row->to_sub_category; ?>"]').prop('selected', true).change();
                }, 1000);
            });
        });
    </script>
    <?php } ?>    
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>التصنيف</label></div>
        <div class="col-md-9">
            @php $input = "category"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
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
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
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
        <div class="col-md-3"><label>الإدارة</label></div>
        <div class="col-md-9">
            @php $input = "adminstration"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر الإدارة</option>
                @foreach ($adminstrations as $admin)
                <option value="{{$admin->id}}" {{ isset($row) && $admin->id == $row->admin->id ? "selected" : "" }}>{{$admin->name}}</option>
                @endforeach
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>القسم </label> </div>
        <div class="col-md-9">
            @php $input = "department"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر القسم</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <?php if(isset($row)) { ?>
        <script>
            $(document).ready(function() {
                $(window).load(function() {
                    setTimeout(function(){
                        $('#department option[value="<?php echo $row->department; ?>"]').prop('selected', true).change();
                    }, 1000);
                });
            });
        </script>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>حالة المتابعة</label></div>
            <div class="col-md-9">
                @php $input = "follow_status"; @endphp
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value=""></option>
                <option value="val-1" {{ isset($row) && $row->follow_status == "val-1" ? "selected" : "" }} >Value 1</option>
                <option value="val-2" {{ isset($row) && $row->follow_status == "val-2" ? "selected" : "" }}>Value 2</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>تاريخ المتابعة </label> </div>
        <div class="col-md-9">
            @php $input = "follow_date"; @endphp
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>درجة الأهمية</label></div>
            <div class="col-md-9">
                @php $input = "priority"; @endphp
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                <option value="1" {{ isset($row) && $row->priority == "1" ? "selected" : "" }} >هام</option>
                <option value="2" {{ isset($row) && $row->priority == "2" ? "selected" : "" }} >هام جدا</option>
                <option value="3" {{ isset($row) && $row->priority == "3" ? "selected" : "" }} >شديد الأهمية</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>درجة السرية</label></div>
            <div class="col-md-9">
                @php $input = "confidentiality"; @endphp
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                <option value="1" {{ isset($row) && $row->confidentiality == "1" ? "selected" : "" }} >سري</option>
                <option value="2" {{ isset($row) && $row->confidentiality == "2" ? "selected" : "" }} >سري جدا</option>
                <option value="3" {{ isset($row) && $row->confidentiality == "2" ? "selected" : "" }} >شديد السرية</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>تذكير</label></div>
        <div class="col-md-9">
            @php $input = "remind"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value=""></option>
                <option value="0" {{ isset($row) && $row->remind == "0" ? "selected" : "" }}>E-mail</option>
                <option value="1" {{ isset($row) && $row->remind == "1" ? "selected" : "" }}>SMS</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label>الرقم أو البريد</label> </div>
        <div class="col-md-9">
            @php $input = "remind_to"; @endphp
            <input type="text"  name="{{ $input }}" id="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}" class="form-control @error($input) is-invalid @enderror" />
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label> تحميل الكتاب الرئيسي </label> </div>
        <div class="col-md-9">
            @php $input = "main_file"; @endphp
            <input type="file"  name="{{ $input }}" id="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}" class="form-control @error($input) is-invalid @enderror" />
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 centerz">
        <button type="button" class="btn btn_5 btn-lg btn-default add_more">تحميل المرفقات</button>
    </div>
</div>


<div class="row">
<div class="col-md-12 ">
    <div id="multiple_attches_div"></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>المرفقات</td>
        </tr>
    </thead>
    <tbody>
        <tr><td><input type="file" name="attachments[]" value="" style="float: right"/></td></tr>
    </tbody>
</table>
</div>
</div>


<div id="success" dir="rtl"></div>


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
    var fieldHTML = '<tr><td><input type="file" name="attachments[]" value="" style="float: right"/><button type="button" class="btn btn-sm btn-danger remove_button" onclick="javascript:void(0);">حذف</button></td></tr>'; //New input field html 
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
