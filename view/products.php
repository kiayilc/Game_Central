<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page des Produits -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Produits</title>
		<!-- En-tête des Pages Web (metas, links) -->
		<?php
			include "./commons/links.php";
		?>
		<link rel="stylesheet" href="css/product.css">
	</head>
	<body>
		<header class="masthead">
			<!-- Barre de Navigation (connecté/non connecté) -->
			<?php
				is_connect();
			?>
		</header>
		<section>
			<div class="container">
				<div class="well well-sm">
					<!-- Affichage des Produits en liste ou en grid -->
					<strong>Display</strong>
					<div class="btn-group col-4">
						<a href="#" id="list" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-th-list"></span>
							List
						</a>
						<a href="#" id="grid" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-th"></span>
							Grid
						</a>
					</div>
					<div class="btn-group">
						<form method="post" action="products.php">
							<!-- Sélection des Catégories -->
							<label>Catégorie</label>
							<select id="prod_category" name="prod_category" class="btn btn-default btn-sm">
								<option value="">--- Catégorie ---</option>
								<!-- Appel des Catégories depuis la base de données -->
								<?php
									select_category();
								?>
							</select>

							<!-- Sélection des Editeurs -->
							<label>Editeur</label>
							<select id="prod_editor" name="prod_editor" class="btn btn-default btn-sm">
								<option value="">--- Editeur ---</option>
								<!-- Appel des Editeurs depuis la base de données -->
								<?php
									select_editor();
								?>
							</select>

							<!-- Sélection de la tranche de Prix -->
							<label>Prix</label>
							<select id="prod_price" name="prod_price" class="btn btn-default btn-sm">
								<option value="">--- Prix ---</option>
								<option value="asc">Croissant</option>
								<option value="desc">Décroissant</option>
							</select>
							<button type="submit" class="nav-font btn btn-default">GO</button>
						</form>
					</div>
				</div>
				<!-- Liste des Produits appelés depuis la base de données -->
				<div id="products" class="row list-group">
					<?php
						product_list();
					?>
				</div>
			</div>
		</section>
		<footer>
			<!-- Scripts JS -->
			<?php
				include "./commons/footer.php";
			?>
			<script src="js/product.js"></script>
		</footer>
	</body>
</html>