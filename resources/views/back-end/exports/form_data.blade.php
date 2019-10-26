<div class="row">
    <div class="col-md-4">
        <div class="col-md-5"> <label>   رقم الصادر </label></div>
        <div class="col-md-7"><label class="outborder"><?php if(isset($row)) { echo $row->id; } else { if($export_number !="") { echo $export_number->id+1; } else { echo '1'; } } ?></label></div>
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
            <input type="text"  name="{{ $input }}" id="{{ $input }}" class="form-control" value="{{ isset($row) ? $row->{$input} : old($input) }}" />
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>صادر إلى </label> </div>
        <div class="col-md-9">
            @php $input = "to_category"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
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
        <div class="col-md-3"><label>الإدارة</label></div>
        <div class="col-md-9">
            @php $input = "adminstration"; @endphp
            <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
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
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
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
<!--div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>حالة المتابعة</label></div>
            <div class="col-md-9">
                @php $input = "follow_status"; @endphp
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
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
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div-->
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>درجة الأهمية</label></div>
            <div class="col-md-9">
                @php $input = "priority"; @endphp
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
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
                <select  name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="1" {{ isset($row) && $row->confidentiality == "1" ? "selected" : "" }} >سري</option>
                <option value="2" {{ isset($row) && $row->confidentiality == "2" ? "selected" : "" }} >سري جدا</option>
                <option value="3" {{ isset($row) && $row->confidentiality == "2" ? "selected" : "" }} >شديد السرية</option>
            </select>
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
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

</script>
<!--//grids-->
