<?php
	if(!$ajaxRequest) require "partials/header.php"
?>

 		<div id="main">
			<section id="explanations">
				<div>
					<h1>Nouveau groupe</h1>

					<button>Importer un groupe existant</button><br />
					<small>Vous pourrez modifier le groupe par la suite</small>

					<form id="dynamicAdd">
						<p>
						<input type="text" name="kids_surname" placeholder="Prénom" />
						<select name="kids_sex">
							<option value="null" label="sexe..." selected disabled />
							<option value="1" label="garçon" />
							<option value="0" label="fille" />
						</select>
						<input type="text" name="kids_parents_name" placeholder="Mail de ses parents" />
						<button>Ajouter</button>
						</p>

						<p>
						<input type="submit" value="Inscrire ce groupe" />
						</p>
					</form>
				<div>
			</section>
		</div>

		<?php require "partials/sidebar.php"; ?>

<?php
	if(!$ajaxRequest) require "partials/footer.php"
?>
