@extends('layouts.admin-master')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="text-center">
        	{{ $projects->links() }}
        </div>
        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Date Started</th>
                    <th>Customer Name</th>
                    <th>Project Name</th>
                    <th>Address</th>
                    <th>Hashtag</th>
                    <th>Cateogry</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach($projects as $project)
                    <tr>

                        <td>{{{ $project->date_started->format('F j, Y') }}}</td>
                        <td>{{{ $project->customer_name }}}</td>
                        <td>{{{ $project->project_name }}}</td>
                        <td>{{{ $project->address }}}</td>
                        <td>{{{ $project->hashtag }}}</td>
                        <td>{{{ $project->category->name }}}</td>
                        <td>
                            <a href="{{{ action('ProjectsController@edit', $project->id) }}}" class="edit-project">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="remove-project" data-project-id="{{{ $project->id }}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="text-center">
        	{{ $projects->links() }}
        </div>
        {{ Form::open(array('action' => array('ProjectsController@destroy', null), 'method' => 'delete', 'id' => 'formDeleteProject')) }}
		{{ Form::close() }}

    </div>

@stop

@section('bottom-script')

	<script>
		$(document).ready(function() {

			$('.remove-project').on('click', function(e) {
				e.preventDefault();

				if (confirm('Are you sure you would like to delete this project?'))
				{
					var projectId = $(this).data('projectId');
					var deleteForm = $('#formDeleteProject');
					var formAction = deleteForm.attr('action');

					formAction += '/' + projectId;

					deleteForm.attr('action', formAction);
					deleteForm.submit();
				}
			})

		})
	</script>

@stop