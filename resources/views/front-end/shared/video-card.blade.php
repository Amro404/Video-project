
  <div class="card" style="width: 20rem;">
  	<a href="/video/{{ $video->id }}" title="{{ $video->name }}">
    	<img class="card-img-top" src="{{ url($video->image)}}" alt="Card image cap" style="height: 160px">
	</a>
    <div class="card-body">
      <a href="/video/{{ $video->id }}" title="{{ $video->name }}"><h4 class="card-title" >{{ $video->name }}</h4></a>
      <p class="card-text">{{ $video->created_at  }}</p>
      <small></small>
    </div>
  </div>
