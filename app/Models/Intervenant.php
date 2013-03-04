<?php
class Intervenant extends Prefab{
  
  function __construct(){
      F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port='.F3::get('db_port').';dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }

  function getChilds(){
    $enfantsDB=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    return $enfantsDB->find(NULL,array('order'=>'prenom'));

  }

  function getDatesByIdIntervenant($id_inter){
    return F3::get('dB')->exec("SELECT DISTINCT date_debut, date_fin FROM session WHERE id_intervenant = ".$id_inter);
  }



  function getInterSession($date_debut,$date_fin){
    //A faire 
    //Je suppose qu'il y a un truc du style les récupérer dans la bdd selon l'account ouvert, sinon j'aurai fait ça
    /*
      $session=new DB\SQL\Mapper(F3::get('dB'),'session');
      return $session->load(array('id_intervenant=?',$id_inter))->name; //Avec $id_inter, l'id du mec actuellement connecté.
    */

     /* return F3::get('dB')->exec(" SELECT DISTINCT session.id_intervenant FROM session WHERE 
                                    session.date_debut = ".$date_debut." AND session.date_fin = ".$date_fin);*/
  }
  

  function getIdEnfants($id_inter, $date_debut){

    return F3::get('dB')->exec(" SELECT session.id_enfant FROM session WHERE
                                 session.id_intervenant = ".$id_inter." AND   session.date_debut = '".$date_debut."'");

  }

  function getNomEnfant($id_enfant){

    return F3::get('dB')->exec("SELECT DISTINCT enfant.prenom FROM enfant WHERE id_enfant = ".$id_enfant);

  }

  /* 
   * Returns an intervenant object
   */
  function getIntervenantByMailAndPassword($mail, $password) {
    $intervenantsMapper = new DB\SQL\Mapper(F3::get('dB'),'intervenant');
    return $intervenantsMapper->find(array('mail="'.$mail.'" AND mdp="'.$password.'"'));
  }

  /* 
   * Returns an intervenant object
   */
  function getIntervenantById($id) {
    $intervenantsMapper = new DB\SQL\Mapper(F3::get('dB'),'intervenant');
    return $intervenantsMapper->find(array('id_intervenant=?', $id));
  }
    

  function addChild($object , $object2){ //Object est l'enfant, object2 est l'inter connecté
    $enfant=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    $enfant->id_enfant = $object->id_enfant;
    $enfant->prenom = $object->prenom;
    $enfant->mail = $object->mail;
    $enfant->mdp = $object->mdp;
    $enfant->sexe = $object->sexe;
    $enfant->save();
    $session=new DB\SQL\Mapper(F3::get('dB'),'session');
    $session->id_enfant = $object->id_enfant;
    $session->id_inter =  $object2->id_inter;
    $session->save();
  }
  function __destruct(){

  }

  function checkLogin() {
    F3::set('connected', false);
    F3::set('user', null);

    //1) check if visitor just logged in
    if(isset($_POST['login_mail']) && isset($_POST['login_password'])) {
      //verifying if logins are ok :
      $login = Intervenant::instance()->getIntervenantByMailAndPassword($_POST['login_mail'], $_POST['login_password']);
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
      F3::set('user', Intervenant::instance()->getIntervenantById(F3::get("SESSION.user"))[0]);
    }
  }
}






?>