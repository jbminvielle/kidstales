<?php

// controlleurs pour les webservices

class App_controller{
 
	function __construct(){

	}

	// Lieu

	function getBestPlaces(){
		$coords = array(
			'min_lat' => $_GET['min_lat'],
			'max_lat' => $_GET['max_lat'],
			'min_lng' => $_GET['min_lng'],
			'max_lng' => $_GET['max_lng'],
		);

		if(!isset($_GET['limite']))
			F3::set('object', Lieu::instance()->getMeilleursLieu($coords));
		else F3::set('object', Lieu::instance()->getMeilleursLieu($coords, $_GET['limite']));
	}

	function upVoteLieu() {
		$id = $_GET['id'];

		//todo set $object with the new vote number
	}

	function downVoteLieu() {
		$id = $_GET['id'];

		//todo set $object with the new vote number
	}

	// Histoires

	function upVoteHistoire() {
		$id = $_GET['id'];

		//todo set $object with the new vote number
	}

	function downVoteHistoire() {
		$id = $_GET['id'];


		//todo set $object with the new vote number
	}

	function getHistoire() {
		$id = $_GET['id'];

		$object = Histoire::instance()->getHistoires(array($id));
	}

	// Intervenant


	// Adding automatically the view call
	function afterRoute() {
		F3::set('ajaxRequest',true);
		echo Views::instance()->render('json.php');
	}


	function __destruct(){

	}
}
?>