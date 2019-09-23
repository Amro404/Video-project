@if(auth()->user())
<form action="/comment/{{ $video->id }}/create" method="POST">
	@csrf

	<div class="form-group">
		<label>Add Comment</label>
		<textarea name="comment" class="form-control" rows="4"></textarea>
	</div>


	<button type="submit" class="btn">Add Comment</button>
</form> 
@endif