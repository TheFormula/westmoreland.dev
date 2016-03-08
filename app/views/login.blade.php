@extends('layouts.admin-master')

@section('top-script')

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-lg-6 col-md-8 col-lg-offset-3 col-md-offset-2">
			{{ Form::open(['action' => 'UsersController@doLogin', 'class' => 'form-horizontal']) }}
			    <p>Please enter your email and password to login.</p>
			    <div class="form-group">
			    	{{ Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('password', 'Password', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password']) }}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Login</button>
			        </div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>

@stop

@section('bottom-script')

@stop