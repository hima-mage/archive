
<!--div class="row">
    <div class="col-md-12 centerz">
        <button type="button" class="btn btn_5 btn-lg btn-default add_more">إضافة المرفقات</button>
    </div>
</div-->

<div class="row">
<div class="col-md-12 ">
    <div id="multiple_attches_div"></div>
    <input type="hidden" id="checker" value="0" >
    <table class="table" id="add_attaches_table">
        <tbody>
            <tr>
                <td>
                    <span role="alert" style="float: right; color: crimson; font-size: small">(* يسمح بإضافة أكثر من مرفق)</span>
                    <button type="button" class="btn btn-primary pull-right add_more" style="display: none;">إضافة مرفق</button>
                    <br><br>
                    <input type="text" name="desc" value="" placeholder="موضوع المرفق" class="form-control" style="width: 250px; float: right;"/><input type="file" name="attachments[]" value="" class="form-control" style="width: 250px; float: right"/>
                    <br><br>
                    <span class="{{ 'desc_error' }} invalid-feedback" role="alert" style="float: right; margin-left: 120px"></span> <span class="{{ 'attachments_error' }} invalid-feedback" role="alert" style="float: right;"></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>


<script>
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_more'); //Add button selector
        var wrapper = $('#add_attaches_table tbody'); //Input field wrapper
        var fieldHTML = '<tr><td><input type="text" name="desc[]" value="" placeholder="موضوع المرفق" class="form-control" style="width: 200px; float: right"/><input type="file" name="attachments[]" value="" style="float: right"/><button type="button" class="btn btn-sm btn-danger remove_button" onclick="javascript:void(0);">حذف</button></td></tr>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            if($("#checker").val()==1) {
                $('#checker').val('0');
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).html(fieldHTML); //Add field html
                }
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
