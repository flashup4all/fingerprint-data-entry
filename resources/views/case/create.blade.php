@extends('layouts.criminal_layout')
@section('title', 'Home - Case')
@section('breadcrumb_title', 'Create Criminal Case')
@section('content')

<h3>Add a Criminal Case Record</h3>
	<form name = "myForm" accept="" action="{{ route('case.save', $user->id)}}" method="POST" enctype="multipart/form-data" onsubmit = "return(validate());">
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
	  	<div class="col-md-12">
	  		<div class="form-group">
			    <label for="">Gender</label>
			    <select id="gender" name="type" class="form-control">
			      <option disabled="">-- Option --</option>
			      <option value="Theft">Theft</option>
			      <option value="Accident">Accident</option>
			      <option value="Thugery">Thugery</option>
			      <option value="Violence">Violence</option>
			      <option value="Curruption Charges">Curruption Charges</option>
			    </select>
			  </div>
	  	</div>
	  	<div class="col-md-12">
	  		<div class="form-group">
			    <label for="">Case Title</label>
			    <input type="text" class="form-control" name="title" placeholder="Title">
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
	  
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Description | Full Case Details</label>
	    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	  <button type="" class="btn btn-primary"> Save </button>
	</form>

@endsection