@extends('layouts.criminal_layout')
@section('title', $user->name)
@section('breadcrumb_title', $user->name)
@section('content')
<h3>Officer Data</h3>
<div class="">
	
	
	<div class="row">
		<a href="{{ route('case.create', $user->id) }}" class="float-left btn btn-outline-info mb-4">Add Case</a>

		<div class="table-responsive">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">title</th>
			      <th scope="col">Description</th>
			      
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($cases as $case)
			    <tr>
			      <th scope="row">{{ $case->id }}</th>
			      <td>{{ $case->title }}</td>
			      <td>{{ \Illuminate\Support\Str::limit($case->description, 150, $end='...') }} </td>
			      <td>
			      	
			      	<a href="{{ url('case/'.$user->id.'/'.$case->id.'/show') }}" class="btn btn-outline-primary">View</a>
			      	<a href="{{ url('case/'.$user->id.'/'.$case->id.'/edit') }}" class="btn btn-outline-info">Edit</a>
			      	<a href="{{ url('case/'.$case->id.'/delete') }}" class="btn btn-outline-danger">Delete</a>
			      	
			      </td>
			    </tr>
			    @endforeach
			    
			  </tbody>
			</table>
		</div>
	</div>
</div>



@endsection