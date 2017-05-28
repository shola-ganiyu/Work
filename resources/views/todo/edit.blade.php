@extends('layouts.default')
@section('content')

<div class="container-fluid"> 
	

		
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<!--<strong>whoops!</strong>all fields are required.-->
				@foreach($errors->all() as $error)
					<p>{{$error}}</p>
				@endforeach
				
			</div>
			@endif
			<div class="col-md-4">
		       <h3 class="well">our table updated......</h3>
	        </div>


		<form  method="POST" action="{{route('todo.update',$todos->id)}}">
         {{method_field('PUT')}} {{csrf_field()}}
		    <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<label class="control-label">Name:</label>
					<input type="text" name="name" id="name" class="form-control" required  placeholder="your name" >
			    </div>
		    </div>
		    <div class="col-md-12 col-xs-12 col-sm-12">
				<div class="form-group">
					<label class="control-label">Email:</label>
					<div class="input-group">
					   <input type="email" name="email" id="email" class="form-control" required><span class="input-group-addon">@example.com</span>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="form-group">
					<label class="control-label">Age:</label>
					<input type="text" name="age" id="age" required class="form-control">
				</div>
			</div>
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div  class="form-group">
					<label class="control-label">Sex:</label>
					<input type="radio" name="sex" value="male">Male
					<input type="radio" name="sex" value="female">Female
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button type="submit" name="submit"  class="btn btn-primary">Update</button>
			</div>
			
			
		</form>
</div>





@endsection