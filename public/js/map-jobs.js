var myLatlng;
var mapOptions, mapElement, map;
var bounds;
var markers = [];

function init() {

    mapOptions = {
        zoom: 4,
        center: {lat: 39.8282, lng: -98.5795}
    };
    mapElement = document.getElementById('map');
    map = new google.maps.Map(mapElement, mapOptions);
}

function clearMarkers() {
    markers.forEach(function(marker) {
        marker.setMap(null);
    });
}

function showMarkers() {
    bounds = map.getBounds();

    clearMarkers();

    // Call you server with ajax passing it the bounds
    $.ajax({
        type: "GET",
        url: "/ajax/get-jobs",
        data: {
            min_lat: bounds.R.R,
            max_lat: bounds.R.j,
            min_lng: bounds.j.j,
            max_lng: bounds.j.R
        },
        success    : function( jobs ) {
            markers = [];
            // get map center
            // geocode if needed(prefer lat lng)
            $.each(jobs, function(){
                var lat = Number(this.latitude);
                var lng = Number(this.longitude);

                var infowindow = new google.maps.InfoWindow({
                    content: this.rendered_html
                });



                var marker = new google.maps.Marker({
                    map: map,
                    position: {lat: lat, lng: lng},
                    animation: google.maps.Animation.DROP,
                    title: this.title
                });

                // places the marker in an array
                markers.push(marker);

                google.maps.event.addListener(marker, 'click', function() {
                    // opens the information window
                    infowindow.open( map, marker );
                });
            });
        }
    });

    // In the ajax callback delete the current markers and add new markers
}

init();

google.maps.event.addListener(map, 'idle', showMarkers);