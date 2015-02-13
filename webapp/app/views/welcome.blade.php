@extends('layout')

@section('content')
	<h2>Welcome, {{Auth::user()->username}}</h2>
	<p>UserId: {{Auth::user()->id}}</p>
	<p>Email: {{Auth::user()->email}}</p>
	<p>Username: {{Auth::user()->username}}</p>
@stop

