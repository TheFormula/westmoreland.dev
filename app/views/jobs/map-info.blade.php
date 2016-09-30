<div class="w-map-overlay">
	<img src="/img/close.png" class="close-window">
	<img src="{{{ $job->image }}}" alt="{{{ $job->project_name }}}">
	<div class="w-map-overlay-header">
		<h2>{{{ $job->project_name }}}</h2>
		<p>{{{ $job->address }}}</p>
	</div>
	<div class="w-map-overlay-body" id="social-media">
		<h3>Project Summary</h3>
		<p>{{{ $job->description }}}</p>
		<h3>Social Media</h3>
	</div>
</div>