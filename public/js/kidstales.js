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
	var map = new google.maps.Map(document.getElementById("map_canvas"),
			mapOptions);
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
