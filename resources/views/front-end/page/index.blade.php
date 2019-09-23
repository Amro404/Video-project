@extends('layouts.app')

@section("meta_desc", $page->meta_desc)

@section("meta_keywords", $page->meta_keywords)


@section("title" , $page->name)

@section('content')
<div class="section section-buttons text-center" style="min-height: 500px">
    <div class="container">
        <div class="title">
            <h1>{{ $page->name }}</h1>
        </div>

       <p>
       	{!! $page->desc !!}
       </p>
        
    </div>    
</div>

@endsection
