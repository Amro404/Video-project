@extends("layouts.app")

@section("title")
  video-project
@endsection

@section("content")
    @include('front-end.homepage-sections.home-page')
    @include('front-end.homepage-sections.videos')
    @include('front-end.homepage-sections.statics')
    @include('front-end.homepage-sections.contact-us')

  
@endsection
