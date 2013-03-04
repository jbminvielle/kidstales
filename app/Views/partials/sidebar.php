<section id="sidebar">
	<div>

		<?php 

		//version quand on est pas identifié
		if(!$connected) { ?>
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

		<?php } else {


		//versionS quand on est identifié

			switch ($viewName) {
				case 'registerKids':
					?>

					<h1>Aide</h1>

					<p>
						Vous partez bientôt. Il est possible de créer une nouvelle "session" ici.
					<br />
						Cliquez sur importer un groupe pour récupérer rapidement un groupe existant. Vous pourrez apporter des modifications après cette opération.
					</p>

					<?php
					break;
				
				case 'dashboard':
					?>

					<h1>Liens rapides</h1>

					<p>
						<a href="kidsSpace">Laisser la main aux enfants</a><br />
						<a href="registerKids">Lancer une nouvelle session</a>
					</p>

					<?php
					break;
				
				default:
					?>
					<p>
						<a href="registerKids">Nouvelle session</a><br />
						
					</p>

					<?php
					break;
			}
		} ?>
	</div>
</section>