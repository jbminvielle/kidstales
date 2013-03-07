<?php
class Lieu extends Prefab{
  
  function __construct(){
    F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port='.F3::get('db_port').';dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }

  function getNomLieu($id_hs) {
 
    return F3::get('dB')->exec(" SELECT lieu.nom from lieu, histoire WHERE id_histoire = ".$id_hs." AND histoire.id_lieu = lieu.id_lieu ");

  }


  
function getMeilleursLieu() {
// todo: qd on a cliqué sur le script, la latlgn sont affichés, sur cet event, appeler la bd, selectionner les meilleurs lieux triés par note
  $getMeilleursLieu=new DB\SQL\Mapper(F3::get('dB'),'lieu');
  return $getMeilleursLieu->find(null);
}


  function addLieu($lat, $lng, $cont, $lieu) {

  	//todo : appeler la base de donnée, ajouter le lieu dedans avec ces informations

  }

  function __destruct(){

  }
}






?>