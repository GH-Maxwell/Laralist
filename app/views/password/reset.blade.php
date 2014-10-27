@extends('layouts/master')

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-cog"></span> Reset Password</h1>
			</div>	
			{{ Form::open() }}
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', '', array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'New Password:') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Password Confirmation:') }}
					{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				</div>
				{{ Form::submit('Reset Password', array('class' => 'btn btn-success btn-full')) }}
				@if (Session::has('error'))
					<p class="reset-error">{{ Session::get('error') }}</p>
				@endif
			{{ Form::close() }}
		</div>
	</div>
@stop