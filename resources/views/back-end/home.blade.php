@extends("back-end.layout.app")

@section("title")
	Home Page
@endsection

@push("css")
	<style type="text/css">

	</style>
@endpush

@section("content")
	
	@component("back-end.layout.header")
		@slot('nav_title')
			Home Page
		@endslot
	@endcomponent



	@include("back-end.home-sections.statics")
	
	@include("back-end.home-sections.latest-comments")

@endsection


@push("js")
	<script type="text/javascript">
		
	</script>
@endpush
