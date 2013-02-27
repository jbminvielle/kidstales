<?php
class Histoire extends Prefab{
	
	function __construct(){
		F3::set('dB',new DB\SQL('mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
	}

	function __destruct(){

	}

	function getHistoires($attr, $value){

		$getHistoires=new DB\SQL\Mapper(F3::get('dB'),'histoire');
        return $getHistoires->find(array($attr.'<?', $value),array('order'=>'date'),array('DESC LIMIT'=>'5'));

	}

	function addHistoires($contenu, $idEnfant, $idLieu, $medias, $date='today'){
		//todo

		return $status; // success ou error
	}

	function getMedia ($idsArray) {
		//todo

		return $medias; //array = tableau
	}

	function addMedia () {
		//todo

		return $status; // success ou error
	}	
}






?>