<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">اسم التصنيف الفرعي</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control">
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>

    @php $input = "cat_id"; @endphp
    <input type="hidden" name="{{ $input }}" value="{{ isset($row) ? $row->cat->id : $parent->id }}">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">التصنيف الرئيسي</label>
            <select name="{{$input}}" class="form-control" readonly disabled>
                <option value="{{isset($row) ? $row->cat->id : $parent->id}}">{{isset($row) ? $row->cat->name : $parent->name}}</option>
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div id="success" dir="rtl"></div>


