<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page de Connexion et Inscription -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Connexion/Inscription</title>
		<!-- En-tête des Pages Web (metas, links) -->
		<?php
			include "./commons/links.php";
		?>
	</head>
	<body>
		<header>
			<!-- Barre de Navigation (connecté/non connecté) -->
			<?php
				is_connect();
			?>
		</header>
		<section>
			<div class="container">
				<!-- Formulaire de Connexion -->
				<fieldset>
					<legend class="nav-font">CONNEXION</legend><br />
					<div class="container">
						<form class="form-horizontal" method="POST" action="../model/connect_login.php">
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-2">Email</label>
								<div class="col-xs-10">
									<input type="email" name="email" class="size-form form-control" id="inputEmail" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="control-label col-xs-2">Mot de passe</label>
								<div class="col-xs-10">
									<input type="password" name ="pwd" class="size-form form-control" id="inputPassword" placeholder="Password">
									<a href="recover_pwd.php">Mot de passe oublié ?</a>
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
				</br>
				
				<!-- Formulaire d'Inscription -->
				<fieldset>
					<legend class="nav-font">INSCRIPTION</legend><br />
					<div class="container">
						<form class="form-horizontal" method="POST" action="../model/signup.php">
							<div class="form-group">
								<label class="control-label col-xs-2">Nom</label>
								<div class="col-xs-10">
									<input type="text" name="lastname" class="size-form form-control" placeholder="Nom">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Prénom</label>
								<div class="col-xs-10">
									<input type="text" name="firstname" class="size-form form-control" placeholder="Prénom">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Date de naissance</label>
								<div class="col-xs-10">
									<input type="date" name="birthday" class="size-form form-control" placeholder="aaaa-mm-jj">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Numéro de téléphone</label>
								<div class="col-xs-10">
									<input type="text" name="phone" class="size-form form-control" placeholder="Numero de téléphone" maxlength="10">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Adresse</label>
								<div class="col-xs-10">
									<input type="text" name="address" class="size-form form-control" placeholder="Adresse">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Code postal</label>
								<div class="col-xs-10">
									<input type="text" name="postal" class="size-form form-control" placeholder="Code postal" maxlength="5">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Ville</label>
								<div class="col-xs-10">
									<input type="text" name="city" class="size-form form-control" placeholder="Ville">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label col-xs-2">Email</label>
								<div class="col-xs-10">
									<input type="email" name="email" class="size-form form-control" id="inputEmail" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="control-label col-xs-2">Mot de passe</label>
								<div class="col-xs-10">
									<input type="password" name ="pwd" class="size-form form-control" id="inputPassword" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="control-label col-xs-2">Confirmation du Mot de passe</label>
								<div class="col-xs-10">
									<input type="password" name ="pwd2" class="size-form form-control" id="inputPassword" placeholder="Password">
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
				include "./commons/footer.php";
			?>
			<script src="js/valid_signup.js"></script>
		</footer>
	</body>
</html>