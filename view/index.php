<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page d'Accueil -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Accueil</title>
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
		</section>
		<footer>
			<!-- Scripts JS -->
			<?php
				include "commons/footer.php";
			?>
		</footer>
	</body>
</html>