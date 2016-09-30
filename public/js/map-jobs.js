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

    showOffices();
    showMarkers();
}

function clearMarkers() {
    markers.forEach(function(marker) {
        marker.setMap(null);
    });
}

function showOffices() {
    $.ajax({
        type: "GET",
        url: '/ajax/get-offices',
        data: { },
        success    : function( offices ) {
            markers = [];
            // get map center
            // geocode if needed(prefer lat lng)
            $.each(offices, function(){
                var office = this;
                var lat = Number(this.latitude);
                var lng = Number(this.longitude);

                var infowindow = this.rendered_html;

                var marker = new google.maps.Marker({
                    map: map,
                    position: {lat: lat, lng: lng},
                    animation: google.maps.Animation.DROP,
                    icon: '/img/map_marker_w.png',
                    title: 'Westmoreland Office'
                });

                // places the marker in an array

                google.maps.event.addListener(marker, 'click', function() {
                    // opens the information window
                    $('#info-window').html(infowindow);
                    $('#info-window').show();
                    // infowindow.open( map, marker );
                });
            });
        }
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
                var job = this;
                var lat = Number(this.latitude);
                var lng = Number(this.longitude);

                var infowindow = this.rendered_html;



                var marker = new google.maps.Marker({
                    map: map,
                    position: {lat: lat, lng: lng},
                    animation: google.maps.Animation.DROP,
                    icon: '/img/map_marker.png',
                    title: this.title
                });

                // places the marker in an array
                markers.push(marker);

                google.maps.event.addListener(marker, 'click', function() {
                    // opens the information window
                    $('#info-window').html(infowindow);
                    $('#info-window').show();
                    getTweets(job.hashtag);
                    // infowindow.open( map, marker );
                });
            });
        }
    });

    // In the ajax callback delete the current markers and add new markers
}

function getTweets(hashtag) {
    var url = '/ajax/get-project-tweets/' + hashtag.substr(1);
    $.ajax({
        type: "GET",
        url: url,
        success    : function( tweets ) {
            var social_media = $('#social-media');
            tweets = JSON.parse(tweets);
            tweets.statuses.forEach(function(tweet) {
                var content = "<p>" + moment(tweet.created_at).format('MMMM Do YYYY') + " - " + tweet.text + " - <a target='_blank' href='https://twitter.com/" + tweet.user.screen_name + "'>@" + tweet.user.screen_name + "</a></p>";
                social_media.append(content);
            })
        }
    });
}

google.maps.event.addDomListener(window, 'load', init);

$('.customers').on('click', function(e) {
    e.preventDefault();
    var customer_id = $(this).data('customerId');

    clearMarkers();
    showMarkers(customer_id);
})