@extends("layouts.default")
@section("content")
	<div class="container-fluid">
			<div class="row">
				@if($message = Session::get('success'))
					<p class="alert alert-success">{{$message}}</p>
				@endif
				<h1 class="jumbotron text-center">our database items...</h1>
				 <a href="{{route('todo.create')}}" class="btn btn-primary col-md-4 col-md-offset-4" style="margin-bottom:10px;">Create a Todo</a> 
				<table class="table table-bordered">
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Age</th>
						<th>Sex</th>
						<th>Action</th>
					</tr>
					@foreach($todos as $todo)
						<tr>
							<td>{{$todo->id}}</td>
							<td>{{$todo->name}}</td>
							<td>{{$todo->email}}</td>
							<td>{{$todo->age}}</td>
							<td>{{$todo->sex}}</td>
							<td>
								<a href="{{route('todo.show',$todo->id)}}" class="btn btn-primary">Show</a>
								<a href="{{route('todo.edit',$todo->id)}}" class="btn btn-info">Edit</a>
								<form method="DELETE" action="{{route('todo.destroy',$todo->id)}}" style="display: inline;">
								<button type="submit" class="btn btn-danger">Delete 
									{{route('todo.destroy',$todo->id)}}
								</button>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
			
			</div>
	</div>


@endsection