<?php
class Intervenant extends Prefab{
  
  function __construct(){
      F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }

  function getChilds(){
    $enfantsDB=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    return $enfantsDB->find(NULL,array('order'=>'prenom'));

  }

  function getInterSession{
    //A faire 
    //Je suppose qu'il y a un truc du style les récupérer dans la bdd selon l'account ouvert, sinon j'aurai fait ça
    /*
      $session=new DB\SQL\Mapper(F3::get('dB'),'session');
      $session->load(array('id_intervenant=?',$id_inter)); //Avec $id_inter, l'id du mec actuellement connecté.
      
  }



  function addChild($object, $object2){
    $enfant=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    $enfant->id_enfant = $object->id_enfant;
    $enfant->prenom = $object->prenom;
    $enfant->mail = $object->mail;
    $enfant->mdp = $object->mdp;
    $enfant->sexe = $object->sexe;
    $enfant->save();
    $session=new DB\SQL\Mapper(F3::get('dB'),'session');
    $session->id_enfant = $object->id_enfant;
  }
  function __destruct(){

  }
}






?>