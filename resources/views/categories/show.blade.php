@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>Category | <strong>{{$categories->name}}</strong>
			<span><a href="{{route('categories.edit',$categories->id)}}" class="btn btn-primary">Edit Category</a></span>
			</h1>
			
				<form role="form" method="post" action="{{route('categories.destroy',$categories->id)}}">{{method_field('DELETE')}}{{csrf_field()}}
				<input type="submit" name="delete" value="Delete Category" class="btn btn-danger">					
				</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2>Category<b>{{$categories->name}}</b><small>Is in <strong style="color:red;">{{$categories->postsCat()->count()}}</strong>Posts</small></h2>
			<table class="table"> 
				<thead>
					<tr>
						<th>Post name</th>
						<th>Links</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories->postsCat as $category)
					<tr>
						<th>{{$category->title}}</th>
						<th><a href="{{route('slug',$category->slug)}}" class="btn btn-info btn-lg">GoTo Post</a></th>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>
</div>
@stop