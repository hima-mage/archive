{{ csrf_field() }}
<div class="row">
        @php $input = "desc"; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">موضوع المرفق</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @php $input = "type"; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">نوع المرفق</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old($input) }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @php $input = "file"; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating"> المرفق</label>
            <input type="file" name="{{ $input }}" value=""
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @php $input = "form_id"; @endphp
            <input type="hidden" name="{{ $input }}" value="{{ $row->{$input} }}">

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">يتبع النموذج</label>
            <select type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" disabled>
                <option value="{{$row->form->id}}">{{$row->form->name}}</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>