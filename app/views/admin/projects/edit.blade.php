@extends('layouts.admin-master')

@section('top-script')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PExnIVP7g3OcjT2J9UPjdtqcTMvrg8" type="text/javascript"></script>
	<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::model($project, ['action' => ['ProjectsController@update', $project->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) }}
			    <p>Enter in the following information for the new project.</p>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks">
				            <label>
				            	{{ Form::checkbox('create_new_customer', 1, false, ['id' => 'create_new_customer']) }}
				            	Create New Customer
				            </label>
			            </div>
			        </div>
			    </div>
			    <div id="new_customer">
				    <div class="form-group">
				    	{{ Form::label('customer_name', 'Customer Name', ['class' => 'col-lg-2 control-label']) }}

				        <div class="col-lg-10">
				        	{{ Form::text('customer_name', null, ['class' => 'form-control', 'id' => 'customer_name', 'placeholder' => 'Customer Name']) }}
				        	{{ $errors->has('customer_name') ? $errors->first('customer_name', '<p><span class="help-block">:message</span></p>') : '' }}
				        </div>
				    </div>
				    <div class="form-group">
				    	{{ Form::label('customer_image', 'Customer Image', ['class' => 'col-lg-2 control-label']) }}

				        <div class="col-lg-10">
				        	{{ Form::file('customer_image', null, ['class' => 'form-control', 'id' => 'customer_image']) }}
				        	{{ $errors->has('customer_image') ? $errors->first('customer_image', '<p><span class="help-block">:message</span></p>') : '' }}
				        </div>
				    </div>
			    </div>
			    <div id="old_customer">
				    <div class="form-group">
				    	{{ Form::label('customer_id', 'Customer', ['class' => 'col-lg-2 control-label']) }}

				        <div class="col-lg-10">
				        	{{ Form::select('customer_id', $customers, null, ['class' => 'form-control', 'id' => 'customer_id']) }}
				        </div>
				    </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('project_name', 'Project Name', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('project_name', null, ['class' => 'form-control', 'id' => 'project_name', 'placeholder' => 'Project Name']) }}
			        	{{ $errors->has('project_name') ? $errors->first('project_name', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('address', 'Project Address', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Project Address']) }}
			        	{{ $errors->has('address') ? $errors->first('address', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    {{ Form::hidden('latitude', null, ['id' => 'latitude']) }}
			    {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
			    <div class="form-group">
			    	{{ Form::label('image', 'Project Image', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) }}
			        	{{ $errors->has('image') ? $errors->first('image', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('date_started', 'Date Started', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('date_started', null, ['class' => 'form-control datepicker', 'id' => 'date_started']) }}
			        	{{ $errors->has('date_started') ? $errors->first('date_started', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('hashtag', 'Project Hashtag', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('hashtag', null, ['class' => 'form-control', 'id' => 'hashtag', 'placeholder' => 'Hashtag']) }}
			        	{{ $errors->has('hashtag') ? $errors->first('hashtag', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    <div class="form-group">
			    	{{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description']) }}
			        	{{ $errors->has('description') ? $errors->first('description', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks">
				            <label>
				            	{{ Form::checkbox('create_new_category', 1, false, ['id' => 'create_new_category']) }}
				            	Create New Category
				            </label>
			            </div>
			        </div>
			    </div>
			    <div id="new_category">
				    <div class="form-group">
				    	{{ Form::label('category_name', 'Category Name', ['class' => 'col-lg-2 control-label']) }}

				        <div class="col-lg-10">
				        	{{ Form::text('category_name', null, ['class' => 'form-control', 'id' => 'category_name', 'placeholder' => 'Category Name']) }}
				        	{{ $errors->has('category_name') ? $errors->first('category_name', '<p><span class="help-block">:message</span></p>') : '' }}
				        </div>
				    </div>
			    </div>
			    <div id="old_category">
				    <div class="form-group">
				    	{{ Form::label('category_id', 'Category', ['class' => 'col-lg-2 control-label']) }}

				        <div class="col-lg-10">
				        	{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']) }}
				        </div>
				    </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <button class="btn btn-sm btn-white" type="submit">Save Project</button>
			        </div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>

@stop

@section('bottom-script')

	<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<script src="/js/form-address-geocode.js"></script>
	<script src="/js/project-form.js"></script>

@stop