<?php
class Lieu extends Prefab{
  
  function __construct(){
    F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port='.F3::get('db_port').';dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }


  
 function getMeilleursLieu($coords, $limite=10) {
// todo: qd on a cliqué sur le script, la latlgn sont affichés, sur cet event, appeler la bd, selectionner les meilleurs lieux triés par note
$getMeilleursLieu=new DB\SQL\Mapper(F3::get('dB'),'lieu');
return$getMeilleursLieu->find(array());

}


  function addLieu($lat, $lng, $cont, $lieu) {

  	//todo : appeler la base de donnée, ajouter le lieu dedans avec ces informations

  function __destruct(){

  }
}






?>