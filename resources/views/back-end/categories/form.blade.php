<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">اسم التصنيف الرئيسي</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control">
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
            </div>
    </div>
</div>
<div id="success" dir="rtl"></div>

