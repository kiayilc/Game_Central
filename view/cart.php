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
									<th class="text-left" colspan="2">Prix Unitaire</th>

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
									<td class="text-right">
										<h5>
											<strong>
												<?php
													if ($CART->m_c_count_games_ordered() == 0)
														{
															$livraison = 0;
														}
													else
													{
														$livraison = number_format(6, 2, ',', ' ');
													}
													echo $livraison . " €";
												?>
											</strong>
										</h5>
									</td>
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
													<?= number_format(($CART->m_c_order_total() + $livraison), 2, ',', ' '); ?>
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
										<form method="POST" action="https://preprod-tpeweb.paybox.com/cgi/MYchoix_pagepaiement.cgi">
											<input type="hidden" name="PBX_SITE"			value="1999888">
											<input type="hidden" name="PBX_RANG"			value="32">
											<input type="hidden" name="PBX_IDENTIFIANT"		value="110647233">
											<input type="hidden" name="PBX_TOTAL"			value="<?= number_format(($CART->m_c_order_total() + 6.94), 2, ',', ' '); ?>">
											<input type="hidden" name="PBX_DEVISE"			value="978">
											<input type="hidden" name="PBX_CMD"				value="ETNA">
											<input type="hidden" name="PBX_PORTEUR"			value="etna@gmail.com">
											<input type="hidden" name="PBX_RETOUR"			value="Mottan:M;Ref:R;Auto:A;Erreur:E">
											<input type="hidden" name="PBX_HASH"			value="SHA512">
											<input type="hidden" name="PBX_TIME"			value="2013-10-11T09:42:08+00:00">
											<input type="hidden" name="PBX_HMAC"			value="D47AB2FDC9ADF9669651C6F8F785F698FB77C75AE314D0060A0528B434F4FE12BA3D027D066A1E8038FA56E7704EC882AA8E44FB36D44957A0F5BA8BE03E03E9">
											<input type="submit" value="Payer"				class="btn btn-success" <?php if ($livraison == 0) { echo "disabled";}?>>
										</form>
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