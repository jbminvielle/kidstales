


<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="main">
			<section id="explanations">
				<div>

					<h1>Suivi de mon groupe</h1>
					<button onclick="openPopup('services/preKidsSpace')">Laisser la main aux enfants</button>

					<p>
					<!--début de la boucle-->
						
						<div class="dashboard_element" onclick="openPopup('service/post?id=')">

							<span class="datetime">
								<?php echo $date ?>
							</span>

							<span class="picture">
							</span>

							<span class="content">
								<span class="line1">
									<span class="author"><?php echo $std ?></span> 
									<span class="lieu"><?php echo $lieu[0]["nom"] ?></span>
								</span>

								<span class="line2">
									<span class="note"></span> -
									<span class="medias"></span>
									<span class="verify"></span>
								</span>
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
