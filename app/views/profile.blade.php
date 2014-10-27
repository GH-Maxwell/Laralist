@extends('layouts/master')

@section('content')
	<h2>Welcome Logged in user! your email is: {{ Auth::user()->email }}</h2>
@stop