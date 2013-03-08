var markersArray=[];

$(document).ready(function() {
	parseHTML();

	launchGoogleMaps();

	//Ajout dynamique de LI pour les marmots.

});

function parseHTML() {
	//alert(document.documentElement.scrollHeight);
	$('#map_canvas, #map_cache').css('height', $(window).height());

	$('a, button[href]').click(function(e) {
		e.preventDefault();
		var src = $(this).attr('href');

		changeUrl(src);
	});

	$(".add_line").click(function(e){
		e.preventDefault();
		// ecrire "
		$('.kid_line:first-child').clone().appendTo('#dynamicAdd>div').find('input[type=text]').val('');
		return false;
	});

	$(".delete_line").live('click', function(e){
		e.preventDefault();
		// ecrire "
		$(this).parents('p').remove();
		return false;
	});

	// todo : support des boutons précédent/suivant
}

function viewChanged(obj) {
	if(obj.redirect) document.location.href = obj.redirect;
	if(obj.cache) $('#map_cache').removeClass('hidden');
	else $('#map_cache').addClass('hidden');

	if(obj.small_header) $('header').addClass('small');
	else $('header').removeClass('small');

	if(obj.map) $('#map_canvas').removeClass('hidden');
	else $('#map_canvas').addClass('hidden');

	closePopup();
	//parseHTML();
}

function changeUrl(src) {

	$.ajax({
		type: "GET",
		url: src,
		data: {ajax: true},
		success: function(response){
			if(typeof response != 'Object') response = JSON.parse(response); //verifying if we have json content

			document.getElementById("ajaxContent").innerHTML = response.page_content;
			document.title = response.page_title;
			window.history.pushState({"html": response.page_content,"pageTitle": response.page_title},"", src);

			viewChanged(response);
		}
	});
}

function openPopup(src) {
	$.ajax({
		type: "GET",
		url: src,
		data: {ajax: true},
		success: function(response){
			if(typeof response != 'Object') response = JSON.parse(response); //verifying if we have json content
			
			//create popup dom object
			$('#popup_overlay').show();
			//$('#popup').html(response.page_content)
			var tmp = $('<div />').html(response.page_content).text();
			$('#popup>div').html(tmp);

			parseHTML();
		}
	});
}

function closePopup() {
	$("#popup>div").html(' ');
	$('#popup_overlay').hide();
}

function launchGoogleMaps() {
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

	map = new google.maps.Map(document.getElementById("map_canvas"),
			mapOptions);
	google.maps.event.addListener(map, 'click', function(event) {
	    placeMarker(event.latLng);
	  });

	$.ajax({
		type: "GET",
		url: 'services/getBestPlaces/',
		data: {ajax: true},
		success: function(bestPlaces){
			if(typeof bestPlaces != 'Object') bestPlaces = JSON.parse(bestPlaces); //verifying if we have json content
			window.bestPlaces = bestPlaces;
		}
	});
}

function placeMarker(location) {

  clearOverlays();

  var marker = new google.maps.Marker({
      position: location,
      map: map
  });

  // Add circle overlay and bind to marker
  var circle = new google.maps.Circle({
    map: map,
    radius: 90000, // 90 km
    fillColor: '#f53d19',
    strokeWeight: 0
  });

  circle.bindTo('center', marker, 'position');
  $('.map_marker').remove();

  var bounds = circle.getBounds();
  checkInCircle(bounds);

  markersArray.push(marker);
  markersArray.push(circle);

  map.setZoom(8);
  map.setCenter(location);

}

function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
}

function checkInCircle(bound) {
  for (var i = 0; i < bestPlaces.length; i++ ) {

    var location = new google.maps.LatLng(bestPlaces[i].lat, bestPlaces[i].lng);
    if(bound.contains(location)) {

      var marker = new google.maps.Marker({
          position: location,
          map: map,
          icon: 'public/css/images/marker.png',
          customInfo: bestPlaces[i]
      });

	  google.maps.event.addListener(marker, 'click', function(event) {

	  	//event.
		//alert(JSON.stringify(this.customInfo));

		$('.map_marker').remove();

		$('body').append('<div class="map_marker"><div class="map_marker_infos" style="background-image:url('+this.customInfo.image+')"><div><h3>'+this.customInfo.nom+'</h3><p><img src="public/css/images/smile.png" alt="smile" /> <img src="public/css/images/smile.png" alt="smile" /> <img src="public/css/images/smile.png" alt="smile" /> <img src="public/css/images/smile.png" alt="smile" /> <img src="public/css/images/smile.png" alt="smile" /> </p><p>'+this.customInfo.description+'</p></div></div></div>');

	  	map.setCenter(event.latLng);
	  });

      markersArray.push(marker);

    }
  }
}

function enterFullScreen(divId, buttonId) {
	var docElm = document.getElementById(divId);
	if (docElm.requestFullscreen) {
	    docElm.requestFullscreen();
	}
	else if (docElm.mozRequestFullScreen) {
	    docElm.mozRequestFullScreen();
	}
	else if (docElm.webkitRequestFullScreen) {
	    docElm.webkitRequestFullScreen();
	}

	$('#'+buttonId).hide();
}

function exitFullScreen() {
	if (document.exitFullscreen) {
		document.exitFullscreen();
	}
	else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	}
	else if (document.webkitCancelFullScreen) {
		document.webkitCancelFullScreen();
	}
}