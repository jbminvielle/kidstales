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

		F3::set('connected', false);
		F3::set('user', null);

		//1) check if visitor just logged in
		if(isset($_POST['login_mail']) && isset($_POST['login_password'])) {
			//verifying if logins are ok :
			$login = Intervenant::instance()->checkLogin($_POST['login_mail'], $_POST['login_password']);
			//if ok, save it into the session
			if(count($login) == 1) {
				F3::set("SESSION.user", $login[0]->id_intervenant);

				//set F3 vars for the session
				F3::set('connected', true);
				F3::set('user', Intervenant::instance()->getIntervenantById(F3::get("SESSION.user")));

				//finally redirect to explore page
				header('Location: explore');
			}
			else F3::set('login_error', 'WRONG_MAIL_OR_PASSWORD');
		}
		else if(isset($_POST['login_mail']) || isset($_POST['login_password']))
			F3::set('login_error', 'SET_MAIL_AND_PASSWORD');

		//2) check if a session exists
		else if (F3::exists("SESSION.user")) {
			//set F3 vars for the session
			F3::set('connected', true);
			F3::set('user', Intervenant::instance()->getIntervenantById(F3::get("SESSION.user")));
		}
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