<?php
class App_controller{

	private $viewName;

	function __construct(){

	}

	function home(){
		F3::set('viewTitle', "Kid's Tales");
		$this->viewName = 'index';
	}

	function explore() {
		F3::set('viewTitle', "Kid's Tales - Explorer");
		$this->viewName = 'explore';
	}

	function register() {
		F3::set('viewTitle', "Kid's Tales - S'inscrire");
		$this->viewName = 'register';
	}

    function registerKids() {
		//todo :get signup informations for session

		F3::set('viewTitle', "Kid's Tales - Inscrire un groupe");
		$this->viewName = 'registerKids';
	}

	function dashboard() {
		//todo : get kids and signup infos for session

		F3::set('viewTitle', "Kid's Tales - Tableau de bord");
		$this->viewName = 'dashboard';
	}

	function kidsSpace() {
		//todo : get kids list and signup infos for session (and logout from kidsplace)

		F3::set('viewTitle', "Kid's Tales - Espace enfant");
		$this->viewName = 'kidsSpace';
	}

	function preKidsSpace() {
		$object = array('page_content'=> 'lol');
		$this->viewName = 'dashboard';
	}

	//adding automatically the view call
	function afterRoute() {

		// This include or not header and footer :
		if(isset($_GET['ajax'])) F3::set('ajaxRequest', true);
		else F3::set('ajaxRequest', false);

		$html = Views::instance()->render($this->viewName.'.php');

		if(F3::get('ajaxRequest')) {
			echo json_encode(array(
				'page_title'=> F3::get('viewTitle'),
				'page_content'=> $html));
		}
		else echo $html;
	}


	function __destruct(){

	}
}
?>