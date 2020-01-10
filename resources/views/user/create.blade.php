@extends('layouts.app')
@section('title', 'Home- Create')
@section('breadcrumb_title', 'Create User')
@section('content')
<h3>Create Record</h3>
<div class="container">
	<form name = "myForm" accept="" action="{{ url('user')}}" method="POST" onsubmit = "return(validate());">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Fullname</label>
	    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="John Doe">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Email</label>
	    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="johndoe@email.com">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">State</label>
	    <select id="state" class="form-control" name="state_id" id="exampleFormControlSelect1" onchange="getLocalGovts()">
	      <option disabled="" selected="">-- option --</option>
	      @foreach($states as $state)
	      <option value="{{ $state->id }}">{{ $state->state }}</option>
	      @endforeach
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Local Govt</label>
	    <select id="local_govt" name="local_govt_id" class="form-control" id="exampleFormControlSelect1">
	      <option disabled="">-- Select State --</option>
	      
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Address</label>
	    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Description</label>
	    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	  <button type="" class="btn btn-primary"> Save </button>
	</form>

	<input type="button" name="biometricCapture" value="Biometric Capture" onclick="captureBiometric()">
<input type="hidden" name="templateXML" id="templateXML" value="">

</div>


@endsection