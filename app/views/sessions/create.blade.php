@extends('layouts/master')

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-lock"></span> Login</h1>
			</div>	
			{{ Form::open(['route' => 'sessions.store']) }}
				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', '', array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
				</div>
				<div class="checkbox">
					<label for="remember">
      					<input type="checkbox" name="remember" id="remember" value="remember"><strong>Remember Me</strong>
      				</label>
  				</div>
				{{ Form::submit('Login', array('class' => 'btn btn-success btn-full')) }}
				{{ HTML::link('password/remind', 'Forgot your password?', array('class' => 'forgot-link')) }}
			{{ Form::close() }}
		</div>
	</div>
@stop