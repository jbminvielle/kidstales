<?php
class Histoire extends Prefab{
	
	function __construct(){
		F3::set('dB',new DB\SQL('mysql:host='.F3::get('db_host').';port='.F3::get('db_port').';dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
	}

	function __destruct(){

	}

	function getHistoires(){

		$getHistoires=new DB\SQL\Mapper(F3::get('dB'),'histoire');
        return $getHistoires->find(NULL,array('order'=>'evaluation'));
        
	}

	function getIdHistoire($id_en, $date_debut, $date_fin){

	return F3::get('dB')->exec("SELECT histoire.id_histoire from histoire WHERE id_enfant = ".$id_en." AND date BETWEEN '".$date_debut."' AND '".$date_fin."'");


	}

	function getDateHistoire($id_hs){

	return F3::get('dB')->exec("SELECT histoire.date from histoire WHERE id_histoire = ".$id_hs);


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