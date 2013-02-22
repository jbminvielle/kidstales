<?php
class App_controller{
 
	function __construct(){

	}


	function getBestPlaces(){
		$post = F3::get('GET');


		$lieus = Lieu::instance()->getBestPlaces();

		echo Views::instance()->render('userref.html');
	}


	function __destruct(){

	}
}
?>