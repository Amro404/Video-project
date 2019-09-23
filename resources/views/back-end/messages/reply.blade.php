@extends("back-end.layout.app")



@section("title")
	Reply Message
@endsection


@section("content")
	
	@component("back-end.layout.header")
		@slot('nav_title')
		  Reply Message
		@endslot
	@endcomponent

  @component("back-end.shared.edit", ["pageTitle" => "Reply Message", "pageDesc" => "Here you can reply message"])
    @slot("slot")
         <div class="row">
            <div class="col-md-12">
              <p><i class="material-icons">reply</i>{{ $message->email }}</p>
            </div>
         </div>
          <form action="/admin/message/reply/{{ $message->id }}" method="POST">
          
            @include("back-end.messages.form")
            <button type="submit" class="btn btn-primary pull-right">Reply</button>
            <div class="clearfix"></div>
          </form>
     
    @endslot    
  @endcomponent

@endsection

