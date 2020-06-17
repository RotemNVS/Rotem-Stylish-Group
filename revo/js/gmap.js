var mapLocation = new google.maps.LatLng(-45.200, -71.4310); //change coordinates here
var marker;
var map;



if (jQuery('#map').length) {
    google.maps.event.addDomListener(window, 'load', initialize);
}

