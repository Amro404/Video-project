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
     
          <form action="/admin/{{ $routeName }}/{{ $row->id }}" method="POST">
            @method("PATCH")
            @include("back-end." . $folderName . ".form")
            <button type="submit" class="btn btn-primary pull-right">Update {{ $mduleName }}</button>
            <div class="clearfix"></div>
          </form>
     
    @endslot    
  @endcomponent

@endsection

