@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Add New Job</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('jobs.index') }}"> Back</a>
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
	<form method="post" action="{{url('jobs')}}" enctype="multipart/form-data">
	
	@csrf
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Name:</strong>            
			<input type='text' name="name" placeholder="Name"  value="{{ $jobs->name or old('name')}}" class="form-control" >
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Description:</strong>            
				<input type='text' name="description" placeholder="Description" class="form-control" value="{{ $jobs->description or old('description') }}" >
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Department:</strong>
				<select class="form-control m-bot15" name="dep_id">
                    <option value="" disabled>Please Select</option>
                        @if ($selectedJobs->count())
                            @foreach($selectedJobs as $selectedJob)
                                        <option value="{{ $selectedJob->id }}" >{{ $selectedJob->name }}</option>
                            @endforeach
                        @endif
		        </select>
		</div>
	</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select class="form-control m-bot15" name="status">
                    <option value="" disabled>Please Select</option>
                    <option value="draft" >Draft</option>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>

	</form>
	 
@endsection