@extends('layouts.admin-master')

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-6 col-sm-offset-3">
			<form class="form-horizontal">
			    <p>Sign in today for more expirience.</p>
			    <div class="form-group"><label class="col-lg-2 control-label">Email</label>

			        <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control"> <span class="help-block m-b-none">Example block-level help text here.</span>
			        </div>
			    </div>
			    <div class="form-group"><label class="col-lg-2 control-label">Password</label>

			        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div>
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Sign in</button>
			        </div>
			    </div>
			</form>
		</div>
	</div>

@stop