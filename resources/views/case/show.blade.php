@extends('layouts.criminal_layout')
@section('title', $case->title)
@section('breadcrumb_title', $case->title)
@section('content')
<br>
<h3>Case ID PDC/CSC/{{ $case->id }}</h3> <small>{{ $user->created_at }}</small>
<div class="container">
	{{$user->name}}
	<div class="row">
		<div class="col-md-12">
			<ul class="list-group-flush">
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    Title
			    <span class="">{{ $case->title }}</span>
			  </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    Type
			    <br>
			    <span class="">{{ $user->type }}</span>
			  </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    Full Details
			    <br>
			    <li class="list-group-item d-flex justify-content-between align-items-center">{{ $case->description }}</li>
			  </li>
			</ul>
		</div>
	</div>
</div>



@endsection