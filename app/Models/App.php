<?php
class App extends Prefab{
  
  function __construct(){
      F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port='.F3::get('db_port').';dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }
  
  function sortStoriesByLocation($attr){
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
  
	function bestStory() {
		//choose the best story
	    $storiesDB=new DB\SQL\Mapper(F3::get('dB'),'stories');
		return $bestStory->find(array('votes>=?'),array('order'=>'note'));
	}

  function __destruct(){

  }
}






?>