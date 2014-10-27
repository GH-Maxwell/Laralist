@extends('layouts/master')

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-user"></span> Sign Up</h1>
			</div>	
			{{ Form::open(['route' => 'users.store']) }}
				<div class="form-group @if ($errors->has('username')) has-error  @endif has-feedback">
					{{ Form::label('username', 'Username:') }}
					{{ Form::text('username', '', array('class' => 'form-control')) }}
					@if ($errors->has('username'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
					@if ($errors->has('username'))<span class="help-block">{{ $errors->first('username') }}</span>@endif
				</div>
				<div class="form-group @if ($errors->has('email')) has-error  @endif has-feedback">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', '', array('class' => 'form-control')) }}
					@if ($errors->has('email'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
					@if ($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
				</div>
				<div class="form-group @if ($errors->has('password')) has-error  @endif has-feedback">
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
					@if ($errors->has('password'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
					@if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
				</div>
				<div class="form-group @if ($errors->has('passwordConfirm')) has-error  @endif has-feedback">
					{{ Form::label('passwordConfirm', 'Password Confirmation:') }}
					{{ Form::password('passwordConfirm', array('class' => 'form-control')) }}
					@if ($errors->has('passwordConfirm'))<span class="glyphicon glyphicon-remove form-control-feedback"></span>@endif
					@if ($errors->has('passwordConfirm'))<span class="help-block">{{ $errors->first('passwordConfirm') }}</span>@endif
				</div>
				<div>
					{{ Form::submit('Create Account', array('class' => 'btn btn-success btn-full')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop