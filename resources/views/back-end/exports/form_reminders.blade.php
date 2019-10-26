<div class="row">
    <!--div class="col-md-12 centerz">
        <button type="button" class="btn btn_5 btn-lg btn-default add_reminder">إضافة تذكير</button>
    </div-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label>عدد التذكيرات</label></div>
        <div class="col-md-9">
            @php $input = "num_reminders"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row" style="display: none;" id="row_reminder1">
    <input type="hidden" name="reminder1" id="reminder1" value="" class="form-control" autocomplete="off">
    <div class="col-md-3">
        <div class="col-md-5"> <label> طريقة التذكير </label></div>
        <div class="col-md-7">
            @php $input = "type1"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="email" >Email</option>
                <option value="sms">SMS</option>
            </select>           
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>التاريخ </label> </div>
        <div class="col-md-7"> 
            @php $input = "datetime1"; @endphp
            <div class="input-group date datetimepicker11"> 
                <input type="text" name="{{ $input }}" id="{{ $input }}" value="" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span></div>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>الأشخاص </label> </div>
        <div class="col-md-7"> 
            @php $input = "user1"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row" style="display: none;" id="row_reminder2">
    <input type="hidden" name="reminder2" id="reminder2" value="" class="form-control" autocomplete="off">
    <div class="col-md-3">
        <div class="col-md-5"> <label> طريقة التذكير </label></div>
        <div class="col-md-7">
            @php $input = "type2"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="email" >Email</option>
                <option value="sms">SMS</option>
            </select>            
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>التاريخ </label> </div>
        <div class="col-md-7"> 
            @php $input = "datetime2"; @endphp
            <div class="input-group date datetimepicker11"> 
                <input type="text" name="{{ $input }}" id="{{ $input }}" value="" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span></div>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>الأشخاص </label> </div>
        <div class="col-md-7"> 
            @php $input = "user2"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row" style="display: none;" id="row_reminder3">
    <input type="hidden" name="reminder3" id="reminder3" value="" class="form-control" autocomplete="off">
    <div class="col-md-3">
        <div class="col-md-5"> <label> طريقة التذكير </label></div>
        <div class="col-md-7">
            @php $input = "type3"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="email" >Email</option>
                <option value="sms">SMS</option>
            </select>            
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>التاريخ </label> </div>
        <div class="col-md-7"> 
            @php $input = "datetime3"; @endphp
            <div class="input-group date datetimepicker11"> 
                <input type="text" name="{{ $input }}" id="{{ $input }}" value="" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span></div>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>الأشخاص </label> </div>
        <div class="col-md-7"> 
            @php $input = "user3"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>

<div class="row" style="display: none;" id="row_reminder4">
    <input type="hidden" name="reminder4" id="reminder4" value="" class="form-control" autocomplete="off">
    <div class="col-md-3">
        <div class="col-md-5"> <label> طريقة التذكير </label></div>
        <div class="col-md-7">
            @php $input = "type4"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control" >
                <option value="">اختر</option>
                <option value="email" >Email</option>
                <option value="sms">SMS</option>
            </select>            
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>التاريخ </label> </div>
        <div class="col-md-7"> 
            @php $input = "datetime4"; @endphp
            <div class="input-group date datetimepicker11"> 
                <input type="text" name="{{ $input }}" id="{{ $input }}" value="" placeholder="MM/DD/YYYY" class="form-control" autocomplete="off">
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span></div>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="col-md-3">
         <div class="col-md-5"><label>الأشخاص </label> </div>
        <div class="col-md-7"> 
            @php $input = "user4"; @endphp
            <select name="{{ $input }}" id="{{ $input }}" class="form-control @error($input) is-invalid @enderror" >
                <option value="">اختر</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        var addButton = $('#num_reminders'); //Add button selector
        
        //Once add button is clicked
        $(addButton).change(function(){
            //Check maximum number of input fields
            if($(addButton).val() == 1){ 
                $('#row_reminder'+1).show(); 
                $('#reminder'+1).val('1'); 

                $('#row_reminder'+2).hide(); 
                $('#reminder'+2).val(''); 

                $('#row_reminder'+3).hide(); 
                $('#reminder'+3).val(''); 

                $('#row_reminder'+4).hide(); 
                $('#reminder'+4).val(''); 
            }
            if($(addButton).val() == 2){ 
                $('#row_reminder'+1).show(); 
                $('#reminder'+1).val('1'); 

                $('#row_reminder'+2).show(); 
                $('#reminder'+2).val('2'); 

                $('#row_reminder'+3).hide(); 
                $('#reminder'+3).val(''); 

                $('#row_reminder'+4).hide(); 
                $('#reminder'+4).val(''); 
            }
            if($(addButton).val() == 3){ 
                $('#row_reminder'+1).show(); 
                $('#reminder'+1).val('1'); 

                $('#row_reminder'+2).show(); 
                $('#reminder'+2).val('2'); 

                $('#row_reminder'+3).show(); 
                $('#reminder'+3).val('3'); 

                $('#row_reminder'+4).hide(); 
                $('#reminder'+4).val(''); 
            }
            if($(addButton).val() == 4){ 
                $('#row_reminder'+1).show(); 
                $('#reminder'+1).val('1'); 

                $('#row_reminder'+2).show(); 
                $('#reminder'+2).val('2'); 

                $('#row_reminder'+3).show(); 
                $('#reminder'+3).val('3'); 

                $('#row_reminder'+4).show(); 
                $('#reminder'+4).val('4'); 
            }
        });
    });

</script>
<!--//grids-->
