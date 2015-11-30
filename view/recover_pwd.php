<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page de Récupération de Mot de Passe -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Mot de Passe Perdu</title>
		<!-- En-tête des Pages Web (metas, links) -->
		<?php
			include "commons/links.php";
		?>
	</head>
	<body>
		<header class="masthead">
			<!-- Barre de navigation (connecté/non connecté) -->
			<?php
				is_connect();
			?>
		</header>
		<section>
			<div class="container">
				<fieldset>
					<legend class="nav-font">MOT DE PASSE PERDU ?</legend><br />
					<div class="container">
						<form class="form-horizontal" method="POST" action="../controller/lost_pwd.php">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-2">Veuillez indiquer votre email</label>
								<div class="col-xs-10">
									<input type="email" name="email" class="size-form form-control" id="inputEmail" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-2 col-xs-10">
									<button type="reset" class="btn">Annuler</button>
									<button type="submit" class="btn">Valider</button>
								</div>
							</div>
						</form>
					</div>
				</fieldset>
			</div>
		</section>
		<footer>
			<!-- Scripts JS -->
			<?php
				include "commons/footer.php";
			?>
		</footer>
	</body>
</html>