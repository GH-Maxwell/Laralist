@extends('layouts/master')

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-cog"></span> Forgot Password?</h1>
			</div>	
			{{ Form::open(array('action' => 'RemindersController@postRemind')) }}
				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', '', array('class' => 'form-control')) }}
				</div>
				{{ Form::submit('Send Reset', array('class' => 'btn btn-success btn-full')) }}
				@if (Session::has('status'))
					<p class="reset-status">{{ Session::get('status') }}</p>
				@else (Session::has('error'))
					<p class="reset-error">{{ Session::get('error') }}</p>
				@endif
			{{ Form::close() }}
		</div>
	</div>
@stop
