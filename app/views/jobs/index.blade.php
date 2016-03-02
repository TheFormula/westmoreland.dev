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
	</section>
	<section class="w-content">
	  	<h2>Who We Serve</h2>
	  	<p class="text-center">Click Logos To See Client Projects</p>
	  	<div class="w-clients flex-container flex-all">
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		    <a href=""><img class="w-client-logo" src="http://placehold.it/225x150"></a>
		</div>
		<section class="w-about flex-all">
		    <h2>Who We Are</h2>
		    <p>Bacon ipsum dolor amet chuck biltong rump kevin corned beef. Swine shankle spare ribs, pork cupim tongue brisket. Pork belly venison pork chop bacon ham hock, capicola turducken biltong rump t-bone. Sausage kevin swine beef ribs porchetta chuck bresaola frankfurter pork belly short ribs jerky. Tri-tip shoulder ball tip corned beef cow chuck. Shank prosciutto ham hock, sirloin andouille bacon hamburger boudin beef ribs sausage venison tail biltong pancetta frankfurter. Ham hock pork loin andouille prosciutto brisket alcatra short ribs pork. Sentance linking to categories: <a href="">restauraunt</a>, <a href="">convinience stores</a>, <a href="">retail</a>, <a href="">banking</a> and <a href="">hospitality</a>.</p>
		    <p>Beef shank doner chicken sirloin boudin pig pork belly strip steak ground round. Brisket pork belly turkey spare ribs hamburger drumstick.  Westmoreland has offices in <a href="">Dallas</a>, <a href="">Tulsa</a>, <a href="">Marfa</a> and <a href="">Utopia</a>. </p>
		</section>
	</section>
@stop

@section('bottom-script')
	<script src="/js/map-jobs.js"></script>
@stop