<div>
 {!! link_to('articles/create', 'Write Article', array('class' => 'btn btnraised
btn-success')) !!}
</div>
@foreach ($articles as $article)
<div>
 <p>{!! $article->id !!} </p>
 <h1>{!! $article->title !!}</h1>
 <p>
 {!! $article->content !!}
 </p>
 <i>By {!! $article->author !!}</i>
 <div>
 {{--
 @if(Auth::user()->role == 'reader')
 {!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btninfo'))
!!}
 @else
 {!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btninfo'))
!!}
 {!! link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn
btn-warning')) !!}
 {!! Form::open(array('route' => array('articles.destroy', $article->id),
'method' => 'delete')) !!}
 {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" =>
"return confirm('are you sure?')")) !!}
 {!! Form::close() !!}
 @endif
 --}}
 </div>
 </div>
@endforeach
<div>
 {!! $articles->render() !!}
</div>