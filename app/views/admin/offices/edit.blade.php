@extends('layouts.admin-master')

@section('top-script')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PExnIVP7g3OcjT2J9UPjdtqcTMvrg8" type="text/javascript"></script>
	<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::model($office, ['action' => ['OfficesController@update', $office->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) }}
			    <p>Enter in the following information for the new office.</p>
			    <div class="form-group">
			    	{{ Form::label('address', 'Office Address', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Office Address']) }}
			        	{{ $errors->has('address') ? $errors->first('address', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('phone_number', 'Office Phone Number', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('phone_number', null, ['class' => 'form-control', 'id' => 'phone_number', 'placeholder' => 'Office Phone Number']) }}
			        	{{ $errors->has('phone_number') ? $errors->first('phone_number', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('description', 'Office Description', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Office Description']) }}
			        	{{ $errors->has('description') ? $errors->first('description', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('image', 'Office Image', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) }}
			        	{{ $errors->has('image') ? $errors->first('image', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    {{ Form::hidden('latitude', null, ['id' => 'latitude']) }}
			    {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Save Office</button>
			        </div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>

@stop

@section('bottom-script')

	<script src="/js/form-address-geocode.js"></script>

@stop