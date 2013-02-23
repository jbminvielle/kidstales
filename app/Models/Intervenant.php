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

  function addChild(){
    $enfantsDB=new DB\SQL\Mapper(F3::get('dB'),'enfant');
    $user->userID='jane';
    $user->password=md5('secret');
    $user->visits=0;
    $user->save();
  }
  function __destruct(){

  }
}






?>