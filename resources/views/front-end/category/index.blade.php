@extends('layouts.app')

@section("meta_desc", $cat->meta_desc)

@section("meta_keywords", $cat->meta_keywords)

@section("title" , $cat->name)

@section('content')
<div class="section section-buttons">
    <div class="container">
        <div class="title">
            <h1>{{ $cat->name }}</h1>
        </div>

        @include("front-end.shared.video-row");
        
    </div>    
</div>

@endsection
