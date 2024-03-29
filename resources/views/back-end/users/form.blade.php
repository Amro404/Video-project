 @csrf
<div class="row">
  @php $input = "name";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Username</label>
      <input type="text" name="{{ $input }}" value="{{ isset($row->name) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "email";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email address</label>
      <input type="email" name="{{ $input }}" value="{{ isset($row->email) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "password";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Password</label>
      <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
    @php $input = "group";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Video status</label>

      <select name="{{ $input }}"  class="form-control @error($input) is-invalid @enderror">
        <option value="admin" {{ isset($row->group) && $row->{$input} == 'admin' ? "selected" : '' }}>Admin</option>
        <option value="user"  {{ isset($row->group) && $row->{$input} == 'user' ? "selected" : '' }}>User</option>
      </select>

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>


