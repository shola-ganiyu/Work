@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7"> 
			<h2>{{$posts->title}}</h2>
			<p class="lead">{{$posts->body}}<p>
		</div>

		<div class="col-md-5">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Added at:</dt>
					<dd>{{$posts->created_at}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Update at:</dt>
					<dd>{{$posts->updated_at}}<dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Slug:</dt>
					<dd><a href="{{url('b',$posts->slug)}}">{{$posts->slug}}</a></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Tags:</dt>
					<dd>
						@foreach($posts->tags as $tag)
						<span class="label label-default"><a href="{{route('tags.show',$tag->id)}}" style="color:white;">{{$tag->name}}</a></span>

						@endforeach
					</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Categories:</dt>
					<dd>
						@foreach($posts->categories as $category)
						<span class="label label-default"><a href="{{route('categories.show',$category->id)}}" style="color:white;">{{$category->name}}</a></span>

						@endforeach
					</dd>
				</dl>
				<div class="row">
					<div class="col-md-6">
						<a href="{{route('posts.edit',$posts->id)}}" class="btn btn-primary btn-block">Edit</a>
					</div>

					<div class="col-md-6">
						<form method="post" action="{{route('posts.destroy',$posts->id)}}">
						{{method_field("DELETE")}}{{csrf_field()}}
						<button type="submit" name="Delete"  class="btn btn-danger btn-block">Delete Post</button>
						</form>
					</div>
					<br><br><br>
					<div class="col-md-12">
						<a href="{{url('/')}}" class="btn btn-success btn-block">All POST</a>
					</div>
				</div>

				

			</div>
		</div>
	</div>

</div>

@stop