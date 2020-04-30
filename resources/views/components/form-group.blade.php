<div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ $label }} :</label>
        <div class="col-sm-9">
            <input class="form-control @error(Str::snake($label)) is-invalid @enderror"
                type="{{!isset($type) ? 'text' : $type}}" {{isset($id) ? 'id=' . $id : null}}
                placeholder="masukan {{Str::ucFirst($label)}}" name="{{Str::snake($label)}}"
                value="{{ session()->get(Str::snake($label)) ? session()->get(Str::snake($label)) : old(Str::snake($label))}}">
            @error(Str::snake($label))
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>