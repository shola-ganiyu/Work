@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4"> 

			<h2>{{$posts->title}}</h2>
			<p class="lead">{{$posts->body}}<p>
		</div>

		<div class="col-md-7">
			<div class="well">
				<dl>
					<dt>Added at:</dt>
					<dd>{{$posts->created_at}}</dd>
				</dl>
				<dl>
					<dt>Update at:</dt>
					<dd>{{$posts->updated_at}}<dd>
				</dl>

				<!-- <div class="col-md-6">
					<a href="{{route('posts.update',$posts->id)}}" class="btn btn-primary">Edit</a>
				</div>

				<div class="col-md-6">

					<form method="post" action="{{route('posts.destroy',$posts->id)}}">
					{{method_field("DELETE")}}{{csrf_field()}}
					<button type="submit" class="btn btn-danger">Delete Post</button>
					</form>
				</div>-->
				<div class="row">
					<div class="col-sm-12">
						<a href="{{url('/')}}" class="btn btn-success btn-block">All POST</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

@stop