@extends("back-end.layout.app")

@php
  $pageTitle = "Create " . $mduleName;
  $pageDesc = "Here you can add" .  $mduleName ;

@endphp

@section("title")
  {{ $pageTitle }}
@endsection


@section("content")
  
  @component("back-end.layout.header")
    @slot('nav_title')
      {{ $pageTitle }}
    @endslot
  @endcomponent


  @component("back-end.shared.create", ["pageTitle" => $pageTitle, "pageDesc" => $pageDesc])
    @slot("slot")
    
          <form action="/admin/{{ $routeName }}" method="POST" enctype="multipart/form-data">
            @include("back-end." . $folderName . ".form")
            <button type="submit" class="btn btn-primary pull-right">Add {{ $mduleName }}</button>
            <div class="clearfix"></div>
          </form>
        
 
    @endslot    
  @endcomponent


@endsection

