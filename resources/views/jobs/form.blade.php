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
			<strong>Category:</strong>            
				<select class="form-control m-bot15" name="cat_id">

			@if ($selectedJobs->count())

				@foreach($selectedJobs as $selectedJob)
					<option value="{{ $selectedJob->id }}" {{ ($jobs->dep_id == $selectedJob->id) ? 'selected="selected"' : '' }}>{{ $selectedJob->name }}</option>    
				@endforeach
			@endif

		</select>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>
