@extends("back-end.layout.app")



@section("title")
	{{ $pageTitle }}
@endsection


@section("content")
	
	@component("back-end.layout.header")
		@slot('nav_title')
			{{ $pageTitle }}
		@endslot
	@endcomponent

  @component("back-end.shared.edit", ["pageTitle" => $pageTitle, "pageDesc" => $pageDesc])
    @slot("slot")
     
          <form action="/admin/{{ $routeName }}/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @method("PATCH")
            @include("back-end." . $folderName . ".form")
            <button type="submit" class="btn btn-primary pull-right">Update {{ $mduleName }}</button>
            <div class="clearfix"></div>
          </form>

    @endslot

    @slot("md4")
      @php
        $url = getYoutubeId($row->youtube)
      @endphp
      @if($url)
          <iframe width="250" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-bottom: 20px;"></iframe>
      @endif   
       <img src="{{ url($row->image) }}" width="250"> 
    @endslot
  @endcomponent

    @component("back-end.shared.edit", ["pageTitle" => "Comments", "pageDesc" => "Here we are can control comments "])
    @include("back-end.comments.index")
    @slot("md4")
        @include("back-end.comments.create")
    @endslot
  @endcomponent


@endsection

