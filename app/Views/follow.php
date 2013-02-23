<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="main">
			<section id="explanations">
				<div>
					<h1>Suivi de mon groupe</span></h1>
					<h2>laisser la main aux enfants</h2>

					<form>
					
					</form>
				<div>
			</section>
		</div>

		<section id="favoritePlaces">
			<div>
				<h1>Les endroits qu'on préfère</h1>

				<figure>
					<img src="public/images/montreuilbellay.jpg" alt="Montreuil-Bellay" />
					<figcaption>Montreuil-Bellay</figcaption>
				</figure>

				<figure>
					<img src="public/images/avignon.jpg" alt="Avignon" />
					<figcaption>Avignon</figcaption>
				</figure>

				<figure>
					<img src="public/images/cantal.jpg" alt="Le Cantal" />
					<figcaption>Le Cantal</figcaption>
				</figure>
				
				<footer>
					<p>Sélection de destinations<br />
						<a href="howweelect">Savoir comment</a>
					</p>
				</footer>
			</div>
		</section>

<?php
	if(!$ajaxRequest) require "partials/footer.php"
?>
