@extends('layouts.master')

@section('top-script')
	<title>Westmoreland</title>
	<!--Map Style Scripts-->
  	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDU4PExnIVP7g3OcjT2J9UPjdtqcTMvrg8&sensor=false&extension=.js'></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
@stop

@section('content')
	<section class="w-map">
	  	<div id='westmoreland-map'></div>
	  	<div id="info-window"></div>
	</section>
	<section class="w-content">
	  	<h2>Who We Serve</h2>
	  	<p class="text-center">Click Logos To See Client Projects</p>
	  	<div class="w-clients flex-container flex-all">
	  		@foreach($customers as $customer)
		    	<a class="customers" data-customer-id="{{{ $customer->id }}}" href=""><img class="w-client-logo" src="{{{ $customer->image }}}" alt="{{{ $customer->name }}}"></a>
		    @endforeach
		</div>
		<section class="w-about flex-all">
		    <h2>Who We Are</h2>
		    {{ $about_us->formatted_body }}
		    <p>Sentance linking to categories: <a href="">restauraunt</a>, <a href="">convinience stores</a>, <a href="">retail</a>, <a href="">banking</a> and <a href="">hospitality</a></p>
		    <p>Westmoreland has offices in <a href="">Dallas</a>, <a href="">Tulsa</a>, <a href="">Marfa</a> and <a href="">Utopia</a>. </p>
		</section>
	</section>
@stop

@section('bottom-script')
	<script src="/js/map-jobs.js"></script>
@stop