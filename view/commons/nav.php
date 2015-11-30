<?php

/*
* Initialisation d'une class DB pour la connexion à la base de donnée
* Initialisation d'une class CART pour l'interaction avec la base de donnée et le panier
*/

	$DB		= new DB_connect();
	$CART	= new Cart($DB);

?>

<!-- Logo -->
<a href="index.php"><img src="img/gcc2.png" class="img-responsive center-block" /></a>

<!-- Barre de navigation utilisateur non connecté -->
<nav id="navbar-main" class="navbar" style="background-color: #FFFFFF; border-bottom: 2px solid #94be2e;">
	<div class="container">
		<div id="navbar">
			<ul class="nav navbar-nav">
				<li class="nav-font"><a href="index.php">ACCUEIL</a></li>
				<li class="nav-font"><a href="products.php">PRODUITS</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-font"><a href="login.php">LOGIN/REGISTER</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span id="nbGame"><?= $CART->m_c_count_games_ordered(); ?> - Items<span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-cart" role="menu">
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
								<li>
									<span class="item">
										<span class="item-left">
											<img src="<?= $order->image ?>" alt="" style="width: 20px; height: 20px;">
											<span class="item-info">
												<span><?= $_SESSION['cart'][$order->name_game]; ?> - </span>
												<span><?= number_format($order->price, 2, ',', ' ')?> €</span>
											</span>
										</span>
										<span class="item-right">
											<a href="cart.php?deleletCart=<?= $order->id_game; ?>">
												<button class="btn btn-xs btn-danger pull-right">x</button>
											</a>
										</span>
									</span>
								</li>
							<?php endforeach; ?>
					  <li class="divider"></li>
					  <li><a class="text-center" href="cart.php">Voir le Panier</a></li>
				  </ul>
				</li>
			</ul>
		</div>
	</div>
</nav>