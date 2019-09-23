@extends('layouts.app')

@section("meta_desc", $video->meta_desc)

@section("meta_keywords", $video->meta_keywords)



@section("title" , $video->name)

@section('content')
<div class="section section-buttons">
    <div class="container">
        <div class="title">
            <h1>{{ $video->name }} | <a href="/category/{{ $video->category->id }}"><span class="badge badge-pill badge-default">{{ $video->category->name }}</span></a></h1>
        </div>

        <div class="row">
        	<div class="col-md-12">
	        	@php 
	        	$url = getYoutubeId($video->youtube) 
	        	@endphp
		        @if($url)
		        	<iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-bottom: 20px;"></iframe>
		       @endif
	       </div>
     	</div>
	    <div class="row"> 
	    	<div class="col-md-6">
	        	<p><b>{{ $video->user->name }}</b></p>
	        	<p><i class="nc-icon nc-calendar-60"></i> {{ $video->created_at }}</p>
	        	<p>{{ $video->desc }}</p>
	        	<p>
	        		@foreach($video->tags as $tag)
	        			<a href="/tag/{{ $tag->id }}"><span class="badge badge-pill badge-primary">{{ $tag->name }}</span></a>
	        		@endforeach
	        	</p>
	       </div>

   		</div>

       	<br>
        <br>

        @if(count($video->comments) > 0)
        	@include("front-end.video.comments")
        @endif 
       
    </div> 

		@include("front-end.video.create-comment")
		
</div>







@endsection
