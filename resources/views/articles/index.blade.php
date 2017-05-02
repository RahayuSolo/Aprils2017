@extends("layouts.application")
@section("content")
  <h1>Article page</h1>

  <div id="list-article">
    @include('articles.list')
  </div>
@stop