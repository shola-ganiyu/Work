@extends('layouts.app')

@section('content')

    
        <div class="col-md-7 col-md-offset-2">
            @if($message = Session::get('success'))
            <p class="alert alert-success">
                {{$message}}
            </p>
            @endif
            <div class="well">
                 @foreach($posts as $post)
                 <p>{{$post->title}}</p>
                 <p>{{$post->created_at}}</p>
                 <p>{{$post->body}}<span><a href="{{route('slug',$post->slug)}}" class="btn btn-primary pull-right">ReadMore</a></span></p>
                @if(Auth::check())
                @if($fave = in_array($post->id, $fav))
                <form action="{{route('removeFavorite',[Auth::user()->id,$post->id])}}" method="post">
                {{method_field('DELETE')}} {{csrf_field()}} 
                @else
                <form method="post" action="{{route('favorites.store',$post->id)}}">
                {{csrf_field()}}
                @endif
                  <button type="submit">
                  <i class="fa fa-heart" aria-hidden='true' {{$fave?'fav':'not-fav'}}></i> 
                  </button>
                </form>
                @endif
                @endforeach
            </div>
            <hr>
             <div class="row">
                <div class="col-md-8 col-md-offset-4">
                  {!!$posts->links()!!}
                 <!--  {!!$posts->render()!!} -->
                </div>
            </div> 
         </div>
        
@stop
