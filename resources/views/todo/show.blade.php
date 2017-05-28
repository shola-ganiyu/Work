@extends("layouts.default")
@section("content")
	<div class="container-fluid">
			<div class="row">

				<h1 class="jumbotron text-center">our database items show...</h1>
				<a href="{{route('todo.index')}}" class="btn btn-success">Back</a>
				<table class="table table-bordered">
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Age</th>
						<th>Sex</th>
						<th>created_at</th>
						<th>updated_at</th>
					</tr>
						<tr>
							<td>{{$todos->id}}</td>
							<td>{{$todos->name}}</td>
							<td>{{$todos->email}}</td>
							<td>{{$todos->age}}</td>
							<td>{{$todos->sex}}</td>
							<td>{{$todos->created_at}}</td>
							<td>{{$todos->updated_at}}</td>
						</tr>
				</table>
		
			</div>
	</div>


@endsection