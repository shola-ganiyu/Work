@extends('layouts.app')
@section('content')
<div class="row" style="height:500px; width:500px;">
	<div class="col-md-8 col-md-offset-4">
		@if($user->UserPost()->count())
	    @foreach($user->UserPost as $post)
        <p>{{$post->title}}</p>
        <p>{{$post->created_at}}</p>
        <p>{{$post->body}}<span><a href="{{route('slug',$post->slug)}}" class= "btn btn-primary pull-right">ReadMore</a></span></p>
        @endforeach          
		@else
		<div class="jumbotron">
			<p>there is nothing in HERE.</p>
			<hr>
			<h3><a href="/">Go and Save</a></h3>
		</div>
		@endif
	</div>
</div>
@stop