@extends('layouts.admin-master')

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::open(['action' => 'ProjectsController@store', 'class' => 'form-horizontal']) }}
			    <p>Enter in the following information for the new project.</p>
			    <div class="form-group">
			    	{{ Form::label('customer_name', 'Customer Name', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('customer_name', null, ['class' => 'form-control', 'id' => 'customer_name', 'placeholder' => 'Customer Name']) }}
			        	{{ $errors->has('customer_name') ? $errors->first('customer_name', '<p><span class="help-block">:message</span></p>') : '' }}
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
			    	{{ Form::label('project_address', 'Project Address', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('project_address', null, ['class' => 'form-control', 'id' => 'project_address', 'placeholder' => 'Project Address']) }}
			        	{{ $errors->has('project_address') ? $errors->first('project_address', '<p><span class="help-block">:message</span></p>') : '' }}
			        </div>
			    </div>
			    {{ Form::hidden('latitude', null, ['id' => 'latitude']) }}
			    {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
			    <div class="form-group">
			    	{{ Form::label('project_hashtag', 'Project Hashtag', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::text('project_hashtag', null, ['class' => 'form-control', 'id' => 'project_hashtag', 'placeholder' => 'Hashtag']) }}
			        	{{ $errors->has('project_hashtag') ? $errors->first('project_hashtag', '<p><span class="help-block">:message</span></p>') : '' }}
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
			    	{{ Form::label('project_category_id', 'Category', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::select('project_category_id', [], null, ['class' => 'form-control', 'id' => 'project_category_id']) }}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks">
				            <label>
				            	<input type="checkbox">
				            	Display on Map
				            </label>
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