@extends('layouts.admin-master')

@section('top-script')

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::open(['action' => 'AboutUsController@store', 'class' => 'form-horizontal']) }}
			    <p>Enter in the following information for the new customer.</p>
			    <div class="form-group">
			    	{{ Form::label('body', 'Content', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'placeholder' => 'Content']) }}
			        	{{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Save About Us</button>
			        </div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>

@stop

@section('bottom-script')

@stop