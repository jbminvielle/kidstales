<?php
class App_controller{

	private $viewName;

	function __construct(){

	}

	function home(){
		F3::set('viewTitle', "Kid's Tales");
		F3::set('smallHeader', false);
		F3::set('map', true);
		F3::set('viewName', 'index');
	}

	function explore() {
		F3::set('viewTitle', "Kid's Tales - Explorer");
		F3::set('smallHeader', true);
		F3::set('map', true);
		F3::set('viewName', 'explore');
	}

	function register() {
		F3::set('viewTitle', "Kid's Tales - S'inscrire");
		F3::set('smallHeader', true);
		F3::set('map', true);
		F3::set('viewName', 'register');
	}

    function registerKids() {
		//todo :get signup informations for session

		F3::set('viewTitle', "Kid's Tales - Inscrire un groupe");
		F3::set('smallHeader', true);
		F3::set('map', false);

		F3::set('viewName', 'registerKids');
	}

	function dashboard() {
		//todo : get kids and signup infos for session

		F3::set('viewTitle', "Kid's Tales - Tableau de bord");
		F3::set('smallHeader', true);
		F3::set('map', false);
		F3::set('viewName', 'dashboard');

		$id=F3::get('PARAMS.id');
	    #récupération de la destination courante

	    
	    $Hist=new Histoire();
	    $cont = $Hist->getHistoires();	    
	    $result=array_map(function($item){return array('id'=>$item->id_histoire,
	    											   'cont'=>$item->cont,
	    											   'datetime'=>$item->date,
	     											   'evaluation'=>$item->evaluation,
	     											   'id_e'=>$item->id_enfant,
	     											   'id_l'=>$item->id_lieu);},$cont);	     
	     F3::set('result',json_encode($result));

	     $Child = new Intervenant();
	     $enfants = $Child->getChilds();
	     $result2=array_map(function($item){return array('id'=>$item->id_enfant,
	    											   'prenom'=>$item->prenom,
	    											   'mail'=>$item->mail,
	     											   'mdp'=>$item->mdp,
	     											   'sexe'=>$item->sexe);},$enfants);	     
	     F3::set('result2',json_encode($result2));
	  

	}

	function kidsSpace() {
		//todo : get kids list and signup infos for session (and logout from kidsplace)

		F3::set('viewTitle', "Kid's Tales - Espace enfant");
		F3::set('smallHeader', true);
		F3::set('map', false);
		F3::set('viewName', 'kidsSpace');
	}

	//adding automatically the view call
	function afterRoute() {

		// This include or not header and footer :
		if(isset($_GET['ajax'])) F3::set('ajaxRequest', true);
		else F3::set('ajaxRequest', false);

		$html = Views::instance()->render(F3::get('viewName').'.php');

		if(F3::get('ajaxRequest')) {
			echo json_encode(array(
				'page_title'=> F3::get('viewTitle'),
				'small_header'=> F3::get('smallHeader'),
				'map'=> F3::get('map'),
				'page_content'=> $html));
		}
		else echo $html;
	}


	function __destruct(){

	}
}
?>