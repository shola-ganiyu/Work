@extends('layouts.default')
@section('content')
<div class="container-fluid"> 

		
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<!--<strong>whoops!</strong>all fields are required..-->
				@foreach($errors->all() as $error)
					<p>{{$error}}</p>
				@endforeach
				
			</div>
			@endif
			<hr/>


		<form  method="post" class="form-horizontal" action="{{route('todo.store')}}">
		  {{csrf_field()}}

				<div class="form-group">
					<label for="name" class="control-label col-md-4">Name:</label>
					<div class="col-md-6">
					<input type="text" name="name" id="name" class="form-control" required placeholder="your name">
					</div>
		        </div>
		   
				<div class="form-group">
					<label for="email" class="control-label col-md-4">Email:</label>
				<div class="col-md-6">
					<div class="input-group">
					   <input type="email" name="email" id="email" class="form-control" required><span class="input-group-addon">@example.com</span>
					</div>
			    </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Age:</label>
				<div class="col-md-6">
					<input type="text" name="age" id="age" required class="form-control">
				</div>
			</div>
				<div  class="form-group">
					<label class="control-label col-md-4">Sex:</label>
					<div class="col-md-6">
					<input type="radio" name="sex" value="male">Male
					<input type="radio" name="sex" value="female">Female
					</div>
				</div>
		
			<div class="col-sm-12 col-sm-offset-1 text-center">
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
			
		</form>
</div>





@endsection