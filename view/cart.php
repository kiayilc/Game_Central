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
									<th class="text-center"></th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
									<!-- Output product in cart -->
								<?php
									$id_game = array_keys($_SESSION['cart']);
									if (empty($id_game))
									{
										$game_in_cart = array();
									}
									else
									{
										$game_in_cart = $DB->m_db_query('SELECT * FROM gc_games WHERE id_game IN (' . implode(',', $id_game) .')');
									}
								?>
								<?php foreach ($game_in_cart as $order): ?>
								<tr>
									<td class="col-sm-8 col-md-6">
										<div class="media">
											<a class="thumbnail pull-left" href="#">
												<img class="media-object" src="<?= $order->image ?>" style="width: 72px; height: 72px;">
											</a>
											<div class="media-body">
												<h4 class="media-heading"><a href="#"><?= $order->name_game; ?></a></h4>
												<h5 class="media-heading"><a href="#"><?= $order->game_console; ?></a></h5>
											</div>
										</div>
									</td>
									<td class="col-sm-1 col-md-1" style="text-align: center">
										<input type="text" class="form-control" id="exampleInputEmail1" value="<?= $_SESSION['cart'][$order->id_game]; ?>" disabled style="text-align: center;">
									</td>
									<td class="col-sm-1 col-md-1 text-center"><strong><?= number_format($order->price, 2, ',', ' ')?> €</strong></td>
									<td class="col-sm-1 col-md-1 text-center"><strong></strong></td>
									<td class="col-sm-1 col-md-1">
										<a href="cart.php?deleletCart=<?= $order->id_game; ?>">
											<button type="button" class="btn btn-danger">
												<span class="glyphicon glyphicon-remove"></span> Supprimer
											</button>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
									<!-- Output product in cart -->
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h5>Sous-total</h5></td>
									<td class="text-right"><h5><strong><?= number_format($CART->m_c_order_total(), 2, ',', ' '); ?> €</strong></h5></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h5>Frais estimés de livraison</h5></td>
									<td class="text-right"><h5><strong>6.94 €</strong></h5></td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>   </td>
									<td><h3>Total</h3></td>
									<td class="text-right">
										<h3>
											<strong>
												<span id="total">
													<?= number_format(($CART->m_c_order_total() + 6.94), 2, ',', ' '); ?>
												</span> €
											</strong>
										</h3>
									</td>
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
										<a href="index.php">
											<button type="button" class="btn btn-success">
												Valider <span class="glyphicon glyphicon-play"></span>
											</button>
										</a>
									</td>
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