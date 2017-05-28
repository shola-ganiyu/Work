@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		@if(Session::has('success'))
		<div class="alert alert-success" role="success">
		<p>{{Session::get('success')}}</p>
		</div>
		@endif
		<div class="col-md-8">
			<div class="header" style="font-size:35px">Tags</div>
			@foreach($tags as $tag)
				<p><a href="{{route('tags.show',$tag->id)}}" class="btn  btn-default bnt-lg">{{$tag->name}}</a><span><small>Is in<b style="color: red">{{$tag->posts()->count()}}</b>posts</small></span></p>
				<hr>
			@endforeach
			<div class="row">
				<div class="col-md-8">
					{{$tags->links()}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<h3>create tag</h3>
				<hr>
				<form method="post" role="form" action="{{route('tags.store')}}" class="form-horizontal">
					{{csrf_field()}}

					<div class="form-group {{$errors->has('name')?'has-error':''}}">
						<label class="control-label col-sm-6" for="name">Tag Name:</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" value="{{old('name')}}"
							class="form-control" required>
							@if($errors->has('name'))
							<span class="help-block">
								<strong>{{$errors}}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Make tag</button>
					    </div>
					</div>


				</form>
					
			</div>
		</div>
	</div>
</div>



@stop