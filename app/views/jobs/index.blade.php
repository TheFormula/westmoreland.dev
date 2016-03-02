@extends('layouts.master')

@section('top-script')
	<title>Westmoreland</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PExnIVP7g3OcjT2J9UPjdtqcTMvrg8" type="text/javascript"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
@stop

@section('content')
	<div class="container">
		<div id="map"></div>
	</div>
@stop

@section('bottom-script')
	<script src="/js/map-jobs.js"></script>
@stop