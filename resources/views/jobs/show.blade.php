@extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Jobs</h2>
            </div>
            <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('jobs.index') }}"> Back</a> 
            </div>
        </div>
    </div>
	
 

    <div class="row">
	@foreach($jobs as $job)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>				
                {{ $job->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $job->description}}
            </div>
        </div>
			@endforeach
    </div>
@endsection