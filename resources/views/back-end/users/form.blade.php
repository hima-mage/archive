{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
                   <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
                </div>
    </div>
    @php $input = "email"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
                   <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
                </div>
    </div>
    @php $input = "mobile"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Mobile</label>
            <input type="number" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
             class="form-control @error($input) is-invalid @enderror">
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    @php $input = "password"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
    @php $input = "group"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User Group</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                <option value="admin" {{ isset($row) && $row->{$input} == 'admin' ? 'selected'  :'' }}>admin</option>
                <option value="user" {{ isset($row) && $row->{$input} == 'user' ? 'selected'  :'' }}>user</option>
            </select>
            <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>