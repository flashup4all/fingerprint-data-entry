@extends('layouts.app')
@section('title', 'Home')
@section('breadcrumb_title', 'Criminals')
@section('content')
<br>
<h3>Criminal Records</h3>
<br>
<div class="container">
	<a href="{{ route('user.create') }}" class="float-left btn btn-outline-info mb-4">Create</a>

	<div class="table-responsive">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">State</th>
		      <th scope="col">Local Govt</th>
		      <th scope="col">Gender</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		    <tr>
		      <th scope="row">{{ $user->id }}</th>
		      <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
		      <td>{{ $user->state->state }} </td>
		      <td>{{ $user->local_govt->name }}</td>
		      <td>{{ $user->gender }}</td>
		      <td>
		      	<a href="{{ route('user.show', $user->id) }}" class="btn btn-outline-primary">View</a>
		      	<a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-info">Edit</a>
		      	<form action="{{ route('user.destroy', $user->id) }}" method="POST">
				    @method('DELETE')
				    @csrf
				    <button class="btn btn-outline-danger">Delete</button>
				</form>
		      	
		      </td>
		    </tr>
		    @endforeach
		    
		  </tbody>
		</table>
	</div>
</div>


@endsection
