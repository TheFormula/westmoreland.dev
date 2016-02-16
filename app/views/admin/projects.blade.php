<div class="row">

	<div class="col-sm-12">

		<table class="table table-striped">

			<thead>

				<tr>

					<th>Date Started</th>
					<th>Title</th>
					<th>Address</th>
					<th>Hashtag</th>

				</tr>

			</thead>

			<tbody>

				@foreach($projects as $project)
					<tr>

						<td>{{{ $project->date_started }}}</td>
						<td>{{{ $project->title }}}</td>
						<td>{{{ $project->address }}}</td>
						<td>{{{ $project->hashtag }}}</td>
						<td>
							<a href="" class="remove-project">
								<i class="fa fa-trash" data-id="{{{ $project->id }}}"></i>
							</a>
						</td>

					</tr>
				@endforeach

			</tbody>

		</table>

	</div>

</div>