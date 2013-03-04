<?php

// controler pour les webservices
class Services_controller{

	function __construct(){

	}

	// Lieu

/*	function getBestPlaces(){
		$coords = array(
			'min_lat' => $_GET['min_lat'],
			'max_lat' => $_GET['max_lat'],
			'min_lng' => $_GET['min_lng'],
			'max_lng' => $_GET['max_lng']
		);

		if(!isset($_GET['limite']))
			F3::set('object', Lieu::instance()->getMeilleursLieu($coords));
		else F3::set('object', Lieu::instance()->getMeilleursLieu($coords, $_GET['limite']));
	}*/

	function getBestPlaces(){

		$Lieu=new Lieu;
		$cont =  $Lieu -> getMeilleursLieu();

		echo json_encode();

	}

	function upVoteLieu() {
		$id = $_GET['id'];

		//todo set $object with the new vote number
	}

	function downVoteLieu() {
		$id = $_GET['id'];

		//todo set $object with the new vote number
	}

	function searchForPlaces() {
		$str = $_GET['str'];
		//todo : récupérer les endroits en fonction d'une chaine de caractères
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
	function addChild(){
        switch(F3::get('VERB')){
            case 'GET':
                echo Views::instance()->render('registerKids.php');
                break;

            case 'POST':
                //$_POST('inputname');
                $Inter=new Intervenant();
                $session = $Inter->getInterSession($intervenant_connecte); // Je ne sais pas comment le récupérer, l'intervenant tel un mapper dans la bdd
                $arraydenfants = "kikoo"; //A choper en JS je présume.

                foreach($arraydenfants as $value)
                {
                	addChild($value , $intervenant_connecte);
                }
                break;
        }
    }

    function signout() {
    	F3::clear('user');
    	F3::set('connected', false);
    	F3::clear('SESSION.user');

    	F3::set('object', array('redirect'=> '../explore'));
    }

	// Dashboard
	function preKidsSpace() {
		F3::set('object', array("page_content"=> Views::instance()->render('partials/preKidsSpace.php')));
	}

	// Adding automatically the view call
	function afterRoute() {
		F3::set('ajaxRequest',true);
		echo Views::instance()->render('json.php');
	}

	function __destruct(){

	}
}
?>