var myLatlng;
var mapOptions, mapElement, map;
var bounds;
var markers = [];

function init() {

    mapOptions = {
        center: new google.maps.LatLng(37.142803,-94.727784),
        zoom: 4,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.DEFAULT,
        },
        disableDoubleClickZoom: false,
        mapTypeControl: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        },
        scaleControl: false,
        scrollwheel: false,
        panControl: false,
        streetViewControl: false,
        draggable : false,
        overviewMapControl: true,
        overviewMapControlOptions: {
            opened: false,
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"color":"#171441"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"color":"#171441"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#b4882e"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#9a751b"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#b4882e"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#b4882e"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b4882e"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"color":"#b4882e"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0f252e"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#171441"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"off"}]}],
    }
    mapElement = document.getElementById('westmoreland-map');
    map = new google.maps.Map(mapElement, mapOptions);

    showMarkers();
}

function clearMarkers() {
    markers.forEach(function(marker) {
        marker.setMap(null);
    });
}

function showMarkers(customer_id) {
    var url;

    if (customer_id == undefined) {
        url = "/ajax/get-projects";
    } else {
        url = "/ajax/get-customer-projects"
    }

    // Call you server with ajax passing it the bounds
    $.ajax({
        type: "GET",
        url: url,
        data: {
            customer_id: customer_id
        },
        success    : function( jobs ) {
            markers = [];
            // get map center
            // geocode if needed(prefer lat lng)
            $.each(jobs, function(){
                var lat = Number(this.latitude);
                var lng = Number(this.longitude);

                var infowindow = new google.maps.InfoWindow({
                    content: this.rendered_html,
                    disableAutoPan: false,
                    zIndex: null,
                    closeBoxMargin: "12px 4px 2px 2px",
                    closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
                    infoBoxClearance: new google.maps.Size(1, 1)
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

google.maps.event.addDomListener(window, 'load', init);

$('.customers').on('click', function(e) {
    e.preventDefault();
    var customer_id = $(this).data('customerId');

    clearMarkers();
    showMarkers(customer_id);
})