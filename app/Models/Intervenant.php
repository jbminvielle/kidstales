<?php
class Intervenant extends Prefab{
  
  function __construct(){
      F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }
  
  function sortStoriesByNote($attr){
    $storiesDB=new DB\SQL\Mapper(F3::get('dB'),'stories');
    return $storiesDB->find(array('votes>=?',20,'location=?',$attr),array('order'=>'note','limit'=>20));

  }

  function getChilds($session){
    $enfantsDB=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    return $enfantsDB->find(array('session=?',$session),array('order'=>'prenom'));

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
  

  function __destruct(){

  }
}






?>