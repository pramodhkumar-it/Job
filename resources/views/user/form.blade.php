<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Name:</strong>            
			<input type='text' name="name" placeholder="Name"  value="{{ $user->name or old('name')}}" class="form-control" >
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Description:</strong>            
				<input type='text' name="email" placeholder="Email" class="form-control" value="{{ $user->email or old('email') }}" >
		</div>
	</div>
	
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>
