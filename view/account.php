<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page du Compte Utilisateur -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Mon compte</title>
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
			<div class="container">
				<!-- Affichage des informations utilisateur -->
				<?php 
					display_info();
				?>
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