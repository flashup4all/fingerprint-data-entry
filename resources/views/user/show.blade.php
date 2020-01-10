@extends('layouts.app')
@section('title', $user->name)
@section('breadcrumb_title', $user->name)
@section('content')
<h3>Officer Data</h3>
<div class="container">
	{{$user->name}}
</div>


@endsection