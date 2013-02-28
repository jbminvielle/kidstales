<?php
class Inter_controller{
 
    function __construct(){
      
    }
 
    function home(){
        $id=F3::get('PARAMS.id');
        #récupération de la destination courante
        $Inter=new Intervenant();
        $childs = $Inter->getChilds();
        //print_r($childs);
        $result=array_map(function($item){return array('prenom'=>$item->prenom,'mdp'=>$item->mdp, 'id'=>$item->id_enfant, 'mail'=>$item->mail);},$childs);
        echo json_encode($result);
    }

    function addChild(){
        switch(F3::get('VERB')){
            case 'GET':
                echo Views::instance()->render('registerKids.php');
                break;

            case 'POST':
                //$_POST('inputname');
                $Inter=new Intervenant();
                $session = 0; //à modifier avec la session de l'inter
                $arraydenfants = "kikoo";
                break;
    }








    }

   
 
    function doc(){
     echo Views::instance()->render('userref.html');
    }
  
 
    function __destruct(){

    } 
}
?>