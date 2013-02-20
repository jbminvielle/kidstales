function initialize() {
var mapOptions = {
  center: new google.maps.LatLng(48.52, 2.1959),
  zoom: 6,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  styles: [
  {
    "featureType": "administrative",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "color": "#3ba58c" }
    ]
  },{
    "featureType": "road",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.natural",
    "stylers": [
      { "color": "#ffefd3" }
    ]
  },{
    "featureType": "transit",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.man_made",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "poi.park",
    "stylers": [
      { "visibility": "on" },
      { "color": "#30b559" }
    ]
  },{
    "featureType": "administrative.country",
    "stylers": [
      { "visibility": "on" }
    ]
  },{
    "featureType": "administrative.locality",
    "elementType": "labels.icon",
    "stylers": [
      { "visibility": "on" },
      { "color": "#e96d42" }
    ]
  }
]
};
var map = new google.maps.Map(document.getElementById("map_canvas"),
    mapOptions);
}

$(document).ready(function() {
	//alert(document.documentElement.scrollHeight);
	$('body>div#map_canvas').css('height', getDocHeight());
});


function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    )+70;
}