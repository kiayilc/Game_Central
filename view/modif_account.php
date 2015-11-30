<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page des Modifications du Compte Utilisateur -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Modification des Informations</title>
		<!-- En-tête des Pages Web (metas, links) -->
		<?php
			include "commons/links.php";
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
			<!-- Formulaire de modification des infos -->
			<div class="container">
				<form method="POST" action="../model/update_info.php">
					<!-- Fonction de modification des infos -->
					<?php 
						modif_info();
					?>
				</form>
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