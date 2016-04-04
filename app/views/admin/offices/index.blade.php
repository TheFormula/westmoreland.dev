@extends('layouts.admin-master')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="text-center">
        	{{ $offices->links() }}
        </div>
        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Address</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($offices as $office)
                    <tr>

                        <td>{{{ $office->address }}}</td>
                        <td>
                            <a href="{{{ action('OfficesController@edit', $office->id) }}}" class="edit-office">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="remove-office" data-office-id="{{{ $office->id }}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="text-center">
        	{{ $offices->links() }}
        </div>
        {{ Form::open(array('action' => array('OfficesController@destroy', null), 'method' => 'delete', 'id' => 'formDeleteOffice')) }}
		{{ Form::close() }}

    </div>

@stop

@section('bottom-script')

	<script>
		$(document).ready(function() {

			$('.remove-office').on('click', function(e) {
				e.preventDefault();

				if (confirm('Are you sure you would like to delete this office?'))
				{
					var officeId = $(this).data('officeId');
					var deleteForm = $('#formDeleteOffice');
					var formAction = deleteForm.attr('action');

					formAction += '/' + officeId;

					deleteForm.attr('action', formAction);
					deleteForm.submit();
				}
			})

		})
	</script>

@stop