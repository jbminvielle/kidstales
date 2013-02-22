<?php
class App_controller{
 
	function __construct(){

	}

	function home(){
		// $id=F3::get('PARAMS.id');
		// #récupération de la destination courante
		// $App=new App();
		// $location=$App->locationDetails($id);
		// if(!$location){
		//   F3::error('404');
		//   return;
		// }
		// F3::set('location',$location);
		
		// if(F3::get('AJAX')){
		//   $ajax['coords']['lat']=$location->lat;
		//   $ajax['coords']['lng']=$location->lng;
		//   $pictures=App::instance()->locationPictures($location->id);
		//   $ajax['pictures']=array_map(function($item){return array('image'=>$item->src);},$pictures);
		//   echo json_encode($ajax);
		//   return;
		// }


		// $next=$App->getNext($location->id);
		// $prev=$App->getPrev($location->id);

		// $linkNext=$next?$next[0]['id'].'-'.$next[0]['title']:'';
		// $linkPrev=$prev?$prev[0]['id'].'-'.$prev[0]['title']:'';
		
		// F3::set('next',$linkNext);
		// F3::set('prev',$linkPrev);


		F3::set('ajaxRequest',false);
		echo Views::instance()->render('index.html');
	}

	function explore() {
		F3::set('ajaxRequest',false);
		echo Views::instance()->render('explore.html');
	}

	function register() {
		F3::set('ajaxRequest',false);
		echo Views::instance()->render('register.html');
	}


	function doc(){
		echo Views::instance()->render('userref.html');
	}


	function __destruct(){

	}
}
?>