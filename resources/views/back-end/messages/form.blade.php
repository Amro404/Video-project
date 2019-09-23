 @csrf
<div class="row">

  @php $input = "message";  @endphp
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Replay Message</label>
      <textarea name="{{ $input }}" cols="30" rows="10" class="form-control @error($input) is-invalid @enderror"></textarea>
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>


