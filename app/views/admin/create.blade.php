@extends('layouts.admin-master')

@section('top-script')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PExnIVP7g3OcjT2J9UPjdtqcTMvrg8" type="text/javascript"></script>
	<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

@stop

@section('content')

	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-sm-12">
			{{ Form::open(['action' => 'ProjectsController@store', 'class' => 'form-horizontal']) }}
			    <p>Enter in the following information for the new project.</p>
			    <div class="form-group">
			        <div class="col-lg-offset-2 col-lg-10">
			            <div class="i-checks">
				            <label>
				            	<input type="checkbox" id="create_new_customer" value="1">
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
			    	{{ Form::label('category_id', 'Category', ['class' => 'col-lg-2 control-label']) }}

			        <div class="col-lg-10">
			        	{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']) }}
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
	<script type="text/javascript">
		$('.datepicker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

		var create_new_customer = $('#create_new_customer').prop('checked');
		if (create_new_customer) {
        	$('#old_customer').hide();
        	$('#new_customer').show();
		} else {
			$('#old_customer').show();
        	$('#new_customer').hide();
		}

		$('#create_new_customer').on('click', function() {
			create_new_customer = $(this).prop('checked');
			if (create_new_customer) {
	        	$('#old_customer').hide();
	        	$('#new_customer').show();
			} else {
				$('#old_customer').show();
	        	$('#new_customer').hide();
			}
		})
	</script>

@stop