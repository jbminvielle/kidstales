<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="main">
			<section id="explanations">
				<div>

					<h1>Suivi de mon groupe</h1>
					<button>Laisser la main aux enfants</button><br />

					<p>
					<!--début de la boucle-->
						
						<div class="dashboard_element">
							<span class="datetime">
								Il y a 5 heures
							</span>

							<span class="picture">
							</span>

							<span class="line1">
								<span class="author">Julien</span> 
								(<span class="lieu">Chateau de Vincennes</span>).
							</span>

							<span class="line2">
								<span class="note">4/5</span> -
								<span class="medias">Commentaire, photos</span>
								<span class="verify">[vérifier]</span>
							</span>
						</div>
						
					<!--fin de la boucle-->
					</p>
				<div>
			</section>
		</div>

		<!-- todo : afficher dans la sidebar la liste des enfants-->
		<?php require "partials/sidebar.php"; ?>

<?php
	if(!$ajaxRequest) require "partials/footer.php"
?>
