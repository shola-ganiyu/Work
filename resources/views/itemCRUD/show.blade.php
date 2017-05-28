@extends('layouts.default')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>show Item</h2>

		</div>
		<div class="pull-right">
			<a href="{{route('itemCRUD.index')}}" class="btn btn-primary">back</a>
		</div>
	</div>
	
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Title:</strong>
			{{$items->title}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Description:</strong>
			{{$items->description}}
		</div>
		
	</div>

</div>

@endsection