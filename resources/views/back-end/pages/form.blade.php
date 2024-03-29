 @csrf
<div class="row">
  @php $input = "name";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" name="{{ $input }}" value="{{ isset($row->name) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "meta_keywords";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Meta Keywords</label>
      <input type="text" name="{{ $input }}" value="{{ isset($row->meta_keywords) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "desc";  @endphp
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Description</label>
      <textarea name="{{ $input }}" cols="30" rows="10" class="form-control @error($input) is-invalid @enderror">{{ isset($row->desc) ? $row->{$input} : '' }}</textarea>
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "meta_desc";  @endphp
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Meta Description</label>
      <textarea name="{{ $input }}" cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($row->meta_desc) ? $row->{$input} : '' }}</textarea>
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>


