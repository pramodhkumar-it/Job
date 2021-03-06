<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Name:</strong>            
			<input type='text' name="name" placeholder="Name"  value="{{ $job->name or old('name')}}" class="form-control" >
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Description:</strong>            
				<input type='text' name="description" placeholder="Description" class="form-control" value="{{ $job->description or old('description') }}" >
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Category:</strong>            
				<select class="form-control m-bot15" name="dep_id">

			@if ($selectedJobs->count())
				@foreach($selectedJobs as $selectedJob)
					<option value="{{ $selectedJob->id }}" >{{ $selectedJob->name }}</option>
				@endforeach
			@endif

		</select>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>
