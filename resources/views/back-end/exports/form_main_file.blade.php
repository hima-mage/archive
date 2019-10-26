<div class="row">
    <div class="col-md-6">
        <div class="col-md-3"><label> الكتاب الرئيسي </label> </div>
        <div class="col-md-9">
            @php $input = "main_file"; @endphp
            <input type="file"  name="{{ $input }}" id="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}" class="form-control @error($input) is-invalid @enderror" />
                <span class="{{ $input.'_error' }} invalid-feedback" role="alert"></span>
        </div>
    </div>
</div>