@extends("layouts.application")

@section("content")

  <div class="row">

    <h2 class="pull-left">List Articles</h2>

  </div>

  <div id="articles-list">
  
  	@include('articles.list')

  </div>

@stop