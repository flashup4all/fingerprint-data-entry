@extends('layouts.app')
@section('title', 'Home- Create')
@section('breadcrumb_title', 'Create Criminal')
@section('content')
<h3>Create Record</h3>
<div class="container">
	<form name = "myForm" accept="" action="{{ url('user')}}" method="POST" enctype="multipart/form-data" onsubmit = "return(validate());">
		{{ csrf_field() }}
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	  <div class="row">
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">First Name</label>
			    <input type="text" class="form-control" name="first_name" placeholder="John Doe">
			 </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Last Name</label>
			    <input type="text" class="form-control" name="last_name" placeholder="John Doe">
			 </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Other Names</label>
			    <input type="text" class="form-control" name="middle_name" placeholder="John Doe">
			 </div>
	  	</div>
	  </div>
	   <div class="row">
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Email</label>
			    <input type="email" class="form-control" name="email" placeholder="johndoe@email.com">
			  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Phone Number</label>
			    <input type="text" class="form-control" name="phone_number" placeholder="johndoe@email.com">
			  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Gender</label>
			    <select id="gender" name="gender" class="form-control" id="">
			      <option disabled="">-- Option --</option>
			      <option value="male">Male</option>
			      <option value="female">Female</option>
			    </select>
			  </div>
	  	</div>
	  </div>
	  <div class="row">
		  	<div class="col-md-6">
		  		<div class="form-group">
				    <label for="exampleFormControlSelect1">State of Origin</label>
				    <select id="state" class="form-control" name="state_id"  onchange="getLocalGovts()">
				      <option disabled="" selected="">-- option --</option>
				      @foreach($states as $state)
				      <option value="{{ $state->id }}">{{ $state->state }}</option>
				      @endforeach
				    </select>
				  </div>
		  	</div>
		  	<div class="col-md-6">
		  		<div class="form-group">
				    <div class="form-group">
					    <label for="">Local Govt</label>
					    <select id="local_govt" name="local_govt_id" class="form-control">
					      <option disabled="">-- Select LGA --</option>
					      
					    </select>
					  </div>
		  	</div>
		  </div>
	  </div>
	  
	  <div class="row">
	  	<div class="col-md-6">
		  	<div class="form-group">
			    <label for="">Current Address</label>
			    <input type="text" name="address" class="form-control"  placeholder="Address">
			  </div>
			</div>
	  	<div class="col-md-6">
	  		<div class="form-group">
			    <label for="">Date of Birth</label>
			    <input type="date" class="form-control" name="age"  placeholder="johndoe@email.com">
			  </div>
	  	</div>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Description</label>
	    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	  <div class="col-md-6">
	    <label for="">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
	  <button type="" class="btn btn-primary"> Save </button>
	</form>

	<input type="button" name="biometricCapture" value="Biometric Capture" onclick="captureBiometric()">
<input type="hidden" name="templateXML" id="templateXML" value="">

</div>


@endsection