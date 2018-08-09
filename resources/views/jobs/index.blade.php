@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Jobs CRUD</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('jobs.create') }}"> Create New Job</a>
			</div>
		</div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th>Status</th>
			<th width="280px">Operation</th>
		</tr>
	@foreach ($jobs as $job)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $job->name}}</td>
		<td>{{ $job->description}}</td>
		<td>{{ $job->status}}</td>
		<td>
			<a class="btn btn-info" href="{{ route('jobs.displays',$job->id) }}">Show</a>
		  <!--  <a class="btn btn-primary" href="{{ route('jobs.edit',$job->id) }}">Edit</a> -->
		  <form action="{{  route('jobs.edit',$job->id) }}" method="GET">
	@method('GET')
	@csrf
	<button>EDIT</button>
</form>
		<td align="left">
<form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
	@method('DELETE')
	@csrf
	<button>Delete</button>
</form>
		</td>
	</tr>
	@endforeach
	</table>
	{!! $jobs->render() !!}
@endsection