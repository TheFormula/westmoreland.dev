var geocoder = new google.maps.Geocoder();

function geocodeAddress(address) {

	// Geocode our address
	geocoder.geocode({ "address": address }, function(results, status) {

	   	// Check for a successful result
	   	if (status == google.maps.GeocoderStatus.OK) {

	   		$('#latitude').val(results[0].geometry.location.lat());
	   		$('#longitude').val(results[0].geometry.location.lng());
	   		$('form button').removeAttr('disabled');
	   	} else {

	       	// Show an error message with the status if our request fails
	       	console.log("Geocoding was not successful - STATUS: " + status);
	   	}
	});
}
if($('#address').val() == "") {
	$('form button').attr('disabled', 'disabled');
}
$('#address').on('keyup', function() {
	$('form button').attr('disabled', 'disabled');
	console.log('changed');
	var address = $(this).val();
	geocodeAddress(address);
});