   <div class="row">
        	<div class="col-md-12">
        		<div class="card card-nav-tabs">
	        		<div class="card-header card-header-warning">
	        		
	        		@php $comments = $video->comments @endphp
	        		
	        		Comments({{ count($comments) }})
	        		</div>
	        		<div class="card-body">
	        		
	        		
	        		@foreach($comments as $comment)
		        		<div class="row">
		        			<div class="col-md-8">
		        				<a href="/profile/{{ $comment->user->id }}/{{ trim(strtolower(str_replace(' ', '-', $comment->user->name))) }}"><h6 class="card-title"><b>{{ $comment->user->name }}</b></h6></a>
		        			</div>
		        			<div class="col-md-4 text-right">
		        				<span><i class="nc-icon nc-calendar-60"></i> {{ $comment->created_at }}</span>
		        				
		        	
		        			</div>
		        		</div>
		   
						<p class="card-text">{{ $comment->comment }}</p>
							@if(auth()->user())
							 	@if(auth()->user()->group == "admin" || auth()->user()->id == $comment->user->id)
			        				<a href="javascript:void(0)" onclick="$(this).next('div').slideToggle();"><b>Edit</b></a>
			        				<div style="display:none; ">
			        					<form action="/comment/{{ $comment->id }}" method="POST">
			        						@csrf

			        						<div class="form-group">
			        							<textarea name="comment" class="form-control" rows="4">{{ $comment->comment }}</textarea>
			        						</div>


			        						<button type="submit" class="btn">Update</button>
			        					</form>
									    
			        				</div>
			        				@endif
		        				@endif
						@if(!$loop->last)
							<hr>
						@endif
		        	@endforeach
		        	</div>

		        	
        	</div>
        </div>