<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="kidsSpaceContainer">
 			<button onclick="enterFullScreen('kidsSpaceContainer', 'fullscreen_button')" id="fullscreen_button">
 				Pour améliorer l'expérience, vous pouvez passer en mode plein écran
 			</button>
 			<form>
 				<h1>Espace à travailler</h1>
 				<p>Onglets des enfants</p>
 				<p>Éléments d'interaction (insert de textes, d'images...)</p>
 				<button>
 					On a fini ! (clique ici et appelle ton responsable)
 				</button>

 			</form>
 		</div>
<?php
	if(!$ajaxRequest) require "partials/footer.php"
?>
