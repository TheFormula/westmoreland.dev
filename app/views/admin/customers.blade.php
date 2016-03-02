<?php
use Carbon\Carbon;
?>

@extends('layouts.admin-master')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="text-center">
        	{{ $customers->links() }}
        </div>
        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Customer Name</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($customers as $customer)
                    <tr>

                        <td>{{{ $customer->name }}}</td>
                        <td>
                            <a href="{{{ action('CustomersController@edit', $customer->id) }}}" class="edit-customer">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="remove-customer" data-customer-id="{{{ $customer->id }}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="text-center">
        	{{ $customers->links() }}
        </div>
        {{ Form::open(array('action' => array('CustomersController@destroy', null), 'method' => 'delete', 'id' => 'formCustomerProject')) }}
		{{ Form::close() }}

    </div>

@stop

@section('bottom-script')

	<script>
		$(document).ready(function() {

			$('.remove-customer').on('click', function(e) {
				e.preventDefault();

				if (confirm('Are you sure you would like to delete this customer?'))
				{
					var customerId = $(this).data('customerId');
					var deleteForm = $('#formDeleteCustomer');
					var formAction = deleteForm.attr('action');

					formAction += '/' + customerId;

					deleteForm.attr('action', formAction);
					deleteForm.submit();
				}
			})

		})
	</script>

@stop