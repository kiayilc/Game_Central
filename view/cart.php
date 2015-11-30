<?php
	/* Includes des controller et model / Connexion à la Base de Données */
	include "../controller/headers.php";
?>

<!-- Page du Panier -->
<!DOCTYPE html>
<html>
	<head>
		<title>Game Central - Panier</title>
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
				<div class="row">
					<div class="col-sm-12 col-md-10 col-md-offset-1">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Produit</th>
									<th>Quantité</th>
									<th class="text-center">Prix</th>
									<th class="text-center">Total</th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="col-sm-8 col-md-6">
									<div class="media">
										<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
										<div class="media-body">
											<h4 class="media-heading"><a href="#">Nom du Jeu</a></h4>
											<h5 class="media-heading"><a href="#">Editeur</a></h5>
										</div>
									</div></td>
									<td class="col-sm-1 col-md-1" style="text-align: center">
									<input type="email" class="form-control" id="exampleInputEmail1" value="3">
									</td>
									<td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
									<td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
									<td class="col-sm-1 col-md-1">
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span> Supprimer
									</button></td>
								</tr>
								<tr>
									<td class="col-md-6">
									<div class="media">
										<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
										<div class="media-body">
											<h4 class="media-heading"><a href="#">Nom du Jeu</a></h4>
											<h5 class="media-heading"><a href="#">Editeur</a></h5>
										</div>
									</div></td>
									<td class="col-md-1" style="text-align: center">
									<input type="email" class="form-control" id="exampleInputEmail1" value="2">
									</td>
									<td class="col-md-1 text-center"><strong>$4.99</strong></td>
									<td class="col-md-1 text-center"><strong>$9.98</strong></td>
									<td class="col-md-1">
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span> Supprimer
									</button></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h5>Sous-total</h5></td>
									<td class="text-right"><h5><strong>$24.59</strong></h5></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h5>Frais estimés de livraison</h5></td>
									<td class="text-right"><h5><strong>$6.94</strong></h5></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h3>Total</h3></td>
									<td class="text-right"><h3><strong>$31.53</strong></h3></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td>
									<a href="products.php"><button type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-shopping-cart"></span> Continuer les achats
									</button></a></td>
									<td>
									<button type="button" class="btn btn-success">
										Valider <span class="glyphicon glyphicon-play"></span>
									</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
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