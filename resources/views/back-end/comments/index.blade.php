

<table class="table">
	<tbody>
		@foreach($comments as $comment)
		<tr>
       
            <td>
            	<p><b><i>{{ $comment->user->email }}</i></b></p>
            	<p>{{ $comment->comment }}</p>
            	<p>{{ $comment->created_at }}</p>
            </td>

            <td class="td-actions text-right">
      		  
            <button type="button" rel="tooltip" onclick="$(this).closest('tr').next('tr').slideToggle()" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Comment">
                  <i class="material-icons">edit</i>
              </button>
  

      			<a href="/admin/comments/{{ $comment->id }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                <i class="material-icons">close</i>
              </a>

            </td>
          </tr>
          <tr style="display: none" class="edit">
          	<td>
          		<form action="/admin/comments/{{ $comment->id }}/edit" method="POST">
      					@csrf
      					@include("back-end.comments.form", ["row" => $comment])
      					<input type="hidden" name="video_id" value="{{ $row->id }}">
      					<button type="submit" class="btn btn-primary pull-right">Update comment</button>

				      </form>
														   
          	</td>
          </tr>
          @endforeach

     
	</tbody>
</table>