@extends('layouts.app')
@section('title', 'Update Recored')
@section('breadcrumb_title', 'Edit Criminal')
@section('content')
<h3>Update Record</h3>
<div class="container">
	<form name = "myForm" action="{{ url('user/' . $user->id) }}"  method="POST" onsubmit = "return(validate());">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
	  <div class="row">
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">First Name</label>
			    <input type="text" class="form-control" value="{{ $user->first_name }}" name="first_name" placeholder="John Doe">
			 </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Last Name</label>
			    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="John Doe">
			 </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Other Names</label>
			    <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}" placeholder="John Doe">
			 </div>
	  	</div>
	  </div>
	   <div class="row">
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Email</label>
			    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="johndoe@email.com">
			  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Phone Number</label>
			    <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="johndoe@email.com">
			  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="form-group">
			    <label for="">Gender</label>
			    <select id="gender" name="gender" class="form-control" value="{{ $user->gender }}">
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
				    <select id="state" class="form-control" name="state_id" id="exampleFormControlSelect1" onchange="getLocalGovts()">
				      <option disabled="" selected="">-- option --</option>
				      @foreach($states as $state)
				      <option value="{{ $state->id }}" @if ($state->id == $user->state_id))
			        selected="selected"
			    @endif>{{ $state->state }}</option>
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
			    <input type="text" name="address" class="form-control" value="{{ $user->address }}"  placeholder="Address">
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
	    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $user->description }}</textarea>
	  </div>
	  <button type="" class="btn btn-primary"> Save </button>
	</form>
</div>


@endsection