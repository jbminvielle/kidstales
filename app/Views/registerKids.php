<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="main">
			<section id="explanations">
				<div>
					<h1>S'inscrire</span></h1>
					<h2>C'est rapide et gratuit !</h2>

					<form>
						<p>
						<label for="name_field" class="info">Nom</label><input type="text" name="name" placeholder="Robert Baden-Powell" id="name_field" /><br />
						<label for="structure_field" class="info">Structure</label><input type="text" name="structure" placeholder="Scouts et Guides de France" id="structure_field" /><br />
						<label for="mail_field" class="info">Mail</label><input type="text" name="mail" placeholder="bp@army.mod.uk" id="mail_field" /><br />
						<label for="psswrd1_field" class="info">Mot de pase</label><input type="password" name="psswrd1" id="psswrd1_field" /><br />
						<label for="psswrd2_field" class="info">Confirmation</label><input type="password" name="psswrd2" id="psswrd2_field" /><br />
						<label class="info">Vous êtes</label>
						<input type="checkbox" name="parent" id="parent_checkbox" /><label for="parent_checkbox">Parent</label><br />
						<input type="checkbox" name="accompagnateur" id="accompagnateur_checkbox" /><label for="accompagnateur_checkbox">Accompagnant de voyage scolaire</label><br />
						<input type="checkbox" name="animateur" id="animateur_checkbox" /><label for="animateur_checkbox">Animateur de colonie</label><br />
						<input type="checkbox" name="autre" id="autre_checkbox" /><label for="autre_checkbox">Autre (précisez...)</label>
						<input type="text" name="autre_valeur" id="autre_field" />
						</p>

						<p>
						<input type="submit" value="S'inscrire" />
						</p>
					</form>
				<div>
			</section>
		</div>

		<?php require "partials/sidebar.php"; ?>
		
<?php
	if(!$ajaxRequest) require "partials/footer.php"
?>
