<?php
class App_controller{
 
	function __construct(){

	}

	function home(){

		F3::set('ajaxRequest',false);
		echo Views::instance()->render('index.php');
	}

	function explore() {
		F3::set('ajaxRequest',false);
		echo Views::instance()->render('explore.php');
	}

	function register() {
		F3::set('ajaxRequest',false);
		echo Views::instance()->render('register.php');
	}


	function doc(){
		echo Views::instance()->render('userref.html');
	}


	function __destruct(){

	}
}
?>