 @csrf
<div class="row">
  @php $input = "name";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Video Name</label>
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
      <label class="bmd-label-floating">Video Description</label>
      <textarea name="{{ $input }}" cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($row->desc) ? $row->{$input} : '' }}</textarea>
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
      <textarea name="{{ $input }}" cols="30" rows="2" class="form-control @error($input) is-invalid @enderror">{{ isset($row->meta_desc) ? $row->{$input} : '' }}</textarea>
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "youtube";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Youtube url</label>
      <input type="url" name="{{ $input }}" value="{{ isset($row->youtube) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "published";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Video status</label>

      <select name="{{ $input }}"  class="form-control @error($input) is-invalid @enderror">
        <option value="1" {{ isset($row->published) && $row->{$input} == 1 ? "selected" : '' }}>published</option>
        <option value="0"  {{ isset($row->published) && $row->{$input} == 0 ? "selected" : '' }}>hidden</option>
      </select>

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
    @php $input = "image";  @endphp
  <div class="col-md-6">
    <div>
      <label >Video image</label>

      <input type="file" name="{{ $input }}">

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "cat_id";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Video Category</label>

      <select name="{{ $input }}"  class="form-control @error($input) is-invalid @enderror">
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ isset($row->cat_id) && $row->{$input} == $category->id ? "selected" : '' }}>{{ $category->name }}</option>
        @endforeach        
      </select>

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @php $input = "skills[]";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Skills</label>

      <select name="{{ $input }}"  class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
        @foreach($skills as $skill)
          <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? "selected" : ""}}>{{ $skill->name }}</option>
        @endforeach        
      </select>

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

    @php $input = "tags[]";  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Tags</label>

      <select name="{{ $input }}"  class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
        @foreach($tags as $tag)
          <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? "selected" : ""}}>{{ $tag->name }}</option>
        @endforeach        
      </select>

       @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>


