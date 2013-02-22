<?php
class App extends Prefab{
	
	function __construct(){
		
	}

	function __destruct(){

	}


	function getHistoires($idsArray) {


		return $histoires //array = tableau
	}

	function addHistoires($contenu, $idEnfant, $idLieu, $medias, $date='today') {


		return $status // success ou error
	}

	function getMedia ($idsArray) {

		return $medias //array = tableau
	}

	function addMedia () {

		return $status // success ou error
	}

	function sortStoriesByNote($attr){
		$storiesDB=new DB\SQL\Mapper(F3::get('dB'),'stories');
		return $storiesDB->find(array('votes>=?',20,'location=?',$attr),array('order'=>'note','limit'=>20));
	}
	  
	function locationPictures($idLocation){
		$pictures=new DB\SQL\Mapper(F3::get('dB'),'pictures');
		return $pictures->find(array('idLocation=?',$idLocation));
	}
	  
	function getNext($id){  
		return F3::get('dB')->exec("select id, title from location where id =(select min(id) from location where id > ".$id.")");
	}

	function getPrev($id){
		return F3::get('dB')->exec("select id, title from location where id =(select max(id) from location where id < ".$id.")");
	}

}






?>