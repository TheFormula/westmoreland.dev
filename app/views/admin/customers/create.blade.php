@extends('layouts.admin-master')

@section('top-script')

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::open(['action' => 'CustomersController@store', 'class' => 'form-horizontal', 'files' => true]) }}
			    <p>Enter in the following information for the new customer.</p>
			    <div class="form-group">
			    	{{ Form::label('name', 'Customer Name', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Customer Name']) }}
			        	{{ $errors->has('name') ? $errors->first('name', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('customer_image', 'Customer Image', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::file('customer_image', null, ['class' => 'form-control datepicker', 'id' => 'customer_image']) }}
			        	{{ $errors->has('customer_image') ? $errors->first('customer_image', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks">
				            <label>
				            	{{ Form::checkbox('display_on_home', 1, false) }}
				            	Display on Home Page
				            </label>
			            </div>
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Save Customer</button>
			        </div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>

@stop

@section('bottom-script')

@stop