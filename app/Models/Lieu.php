<?php
class Lieu extends Prefab{
  
  function __construct(){
    F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }

  function getMeilleursLieu($array, $limite=10) {

  	//todo : appeler la base de donnée, selectionner les meilleurs lieux triés par note, en limitant à $limite

  	return $meilleursLieu;
  }


  function addLieu($lat, $lng, $cont, $lieu) {

  }

  	//todo : appeler la base de donnée, ajouter le lieu dedans avec ces informations

  function __destruct(){

  }
}






?>