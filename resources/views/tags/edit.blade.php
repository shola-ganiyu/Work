@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<h3>Update tag</h3>
				<hr>
				<form method="post" role="form" action="{{route('tags.update',$tags->id)}}"      class="form-horizontal">
					{{method_field('PUT')}} {{csrf_field()}}

					<div class="form-group {{$errors->has('name')?'has-error':''}}">
						<label class="control-label col-sm-6" for="name">Tag Name:</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" required value="{{$tags->name}}">
							@if($errors->has('name'))
							<span class="help-block">
								<strong>{{$errors}}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Update tag</button>
					    </div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
@stop