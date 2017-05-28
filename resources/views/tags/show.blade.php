@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>Tag | <strong>{{$tags->name}}</strong>
			<span><a href="{{route('tags.edit',$tags->id)}}" class="btn btn-primary">Edit Tag</a></span></h1>
			
				<form role="form" method="post" action="{{route('tags.destroy',$tags->id)}}">{{method_field('DELETE')}}{{csrf_field()}}
				<input type="submit" name="delete" value="Delete Tag" class="btn btn-danger">					
				</form>
			
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<h2>Tag<b>{{$tags->name}}</b><small>Is in <strong style="color:red;">{{$tags->posts()->count()}}</strong>Posts</small></h2>
			<table class="table"> 
				<thead>
					<tr>
						<th>Post name</th>
						<th>Links</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags->posts as $tag)
					<tr>
						<th>{{$tag->title}}</th>
						<th><a href="{{route('slug',$tag->slug)}}" class="btn btn-info btn-lg">GoTo Post</a></th>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>

</div>
@stop