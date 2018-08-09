@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Add New Department</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('department.index') }}"> Back</a>
			</div>
		</div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="post" action="{{url('department')}}" enctype="multipart/form-data">
	
	@csrf
   @include('department.form')
	</form>
	 
@endsection