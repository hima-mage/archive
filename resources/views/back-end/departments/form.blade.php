{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">اسم القسم</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                   class="form-control @error($input) is-invalid @enderror">
                   <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
                </div>
    </div>
    @php $input = "admin_id"; @endphp
    <input type="hidden" name="{{ $input }}" value="{{ isset($row) ? $row->admin->id : $parent->id }}">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">الإدارة </label>
            <select type="text" class="form-control" disabled>
                <option value="{{isset($row) ? $row->admin->name : $parent->id}}">{{isset($row) ? $row->admin->name : $parent->name}}</option>
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>
<div id="success" dir="rtl"></div>
