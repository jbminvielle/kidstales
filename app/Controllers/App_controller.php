<?php
class App_controller{

	private $viewName;

	function __construct(){

		//default values :
		F3::set('viewTitle', "");
		F3::set('smallHeader', true);
		F3::set('map', false);
		F3::set('viewName', '');
		F3::set('opt', array());		

	}

	//verifying automatically the login before anything else
	function beforeRoute() {
		Intervenant::instance()->checkLogin();
	}

	function home(){
		if(F3::get('connected')) return self::explore(); //redirect to explore if connected
		F3::set('viewTitle', "Kid's Tales");
		F3::set('smallHeader', false);
		F3::set('map', true);
		F3::set('viewName', 'index');
	}

	function explore() {
		F3::set('viewTitle', "Kid's Tales - Explorer");
		F3::set('map', true);
		F3::set('viewName', 'explore');
	}

	function register() {
		F3::set('viewTitle', "Kid's Tales - S'inscrire");
		F3::set('map', true);
		F3::set('viewName', 'register');
	}

	function registerKids() {
		//get signup informations
		if(!self::checkConnexion()) return false;

		F3::set('viewTitle', "Kid's Tales - Inscrire un groupe");
		F3::set('viewName', 'registerKids');
	}

	function dashboard() {
		//get signup informations
		if(!self::checkConnexion()) return false;

		F3::set('viewTitle', "Kid's Tales - Tableau de bord");
		F3::set('viewName', 'dashboard');

		$id=F3::get('PARAMS.id');
	    #récupération de la destination courante
	    /* 
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
	     F3::set('result2',json_encode($result2));*/

	     /* Données de la table histoire */    
	    $Hist=new Histoire();
	    $cont = $Hist->getHeureHistoire(0);
	    F3::set('cont',$cont);
	        	     
	     
		/* Données de la table enfants/intervenant */
	     $Child = new Intervenant();
	     $id_inter = $Child->getInterSession('2013-07-20', '2013-07-30');//id_inter de la session
	     $pre = F3::get('user')->prenom;
	     
	     /* Recup id enfant*/
	     //$id_e = $Child->getIdEnfants(F3::get('user')->id, '2013-07-20');	//id de l'enfant en fonct° de id_inter et date_debut de la session
	     //F3::set('result',Views::instance()->toJSON($id_e,array('id_enfant'=>'id_enfant')));


	     $enfants = $Child->getNomEnfant(0);//Nom de l'enfant en fonction de l'histoire
	     F3::set('enfants',$enfants);
	     

		/* Données de la table lieu */
	     $Statement = new Lieu();
	     $lieu = $Statement->getNomLieu(0);//Nom du lieu en fonction de l'histoire
	     F3::set('lieu',$lieu);	
	  

	}

	function kidsSpace() {
		//get signup informations
		if(!self::checkConnexion()) return false;

		F3::set('viewTitle', "Kid's Tales - Espace enfant");
		F3::set('viewName', 'kidsSpace');
	}

	function checkConnexion() {
		if(!F3::get('connected')) {
			header('HTTP/1.0 403 Forbidden');
			return false;
		}
		return true;
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
				'opt'=> F3::get('opt'),
				'page_content'=> $html));
		}
		else echo $html;
	}


	function __destruct(){

	}
}
?>