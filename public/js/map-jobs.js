var myLatlng;
var mapOptions, mapElement, map;

function init() {

    mapOptions = {
        zoom: 4,
        center: {lat: 39.8282, lng: -98.5795}
    };
    mapElement = document.getElementById('map');
    map = new google.maps.Map(mapElement, mapOptions);
}

$.ajax({
    type: "GET",
    url: "/ajax/get-jobs",
    success    : function( jobs ) {
        var markers = [];
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

init();