<?php
class App_controller{

	private $viewName;

	function __construct(){

	}

	function home(){
		$this->viewName = 'index';
	}

	function explore() {
		$this->viewName = 'explore';
	}

	function register() {
		$this->viewName = 'register';
	}

	function registerKids() {
		//todo :get signup informations for session

		$this->viewName = 'registerKids';
	}

	function dashboard() {
		//todo : get kids and signup infos for session

		$this->viewName = 'dashboard';
	}

	function kidsSpace() {
		//todo : get kids list and signup infos for session (and logout from kidsplace)

		$this->viewName = 'kidsSpace';
	}

	//adding automatically the viw call
	function afterRoute() {
		F3::set('ajaxRequest',false);
		echo Views::instance()->render($this->viewName.'.php');
	}

	function __destruct(){

	}
}
?>