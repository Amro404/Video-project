<form action="/admin/comments" method="POST">
	 @csrf
	@include("back-end.comments.form")
	<input type="hidden" name="video_id" value="{{ $row->id }}">
	<button type="submit" class="btn btn-primary pull-right">Add comment</button>

</form>