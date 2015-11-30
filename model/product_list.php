<?php
	function	product_list()
	{
		$conn	= db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
		
		if(isset($_POST['prod_category']) && isset($_POST['prod_editor']))
		{
			$category = utf8_decode($_POST['prod_category']);
			$editor = utf8_decode($_POST['prod_editor']);
			$price = $_POST['prod_price'];
			
			if ($category != "")
			{
				$query	= $conn->prepare(_SC_CATEGORY_);
				$query->execute(array(
					'r_cat' => $category
				));
				echo '<div class="container"><fieldset><legend>' . $_POST['prod_category'] . '</legend></fieldset></div>';
			}
			else if ($editor != "")
			{
				$query	= $conn->prepare(_SC_EDITOR_);
				$query->execute(array(
					'r_editor' => $editor
				));
				echo '<div class="container"><fieldset><legend>' . $_POST['prod_category'] . '</legend></fieldset></div>';
			}
			else if ($price == "asc")
			{
				$query	= $conn->prepare(_SC_ASC_PRICE_);
				$query->execute();
				echo '<div class="container"><fieldset><legend>Prix par ordre croissant</legend></fieldset></div>';
			}
			else if ($price == "desc")
				{
				$query	= $conn->prepare(_SC_DESC_PRICE_);
				$query->execute();
				echo '<div class="container"><fieldset><legend>Prix par ordre décroissant</legend></fieldset></div>';
			}
			else
			{
				$query	= $conn->prepare(_SC_PRODUCTS_);
				$query->execute();
				echo '<div class="container"><fieldset><legend>Tous les Jeux</legend></fieldset></div>';
			}
		}
		else
		{
			$query	= $conn->prepare(_SC_PRODUCTS_);
			$query->execute();
			echo '<div class="container"><fieldset><legend>Tous les Jeux</legend></fieldset></div>';
		}
		
		while ($games = $query->fetch())
		{
			echo '<div class="item col-xs-4 col-lg-4">' . "\n\t";
			echo '<div class="thumbnail">' . "\n\t";
			echo '<img class="list-group-image" src="' . $games['image'] . '"/>' . "\n\t";
			echo '<div class="caption">' . "\n\t";
			echo '<fieldset><legend><h4 class="group inner list-group-item-heading">' . utf8_encode($games['name_game']) . '</h4></legend></fieldset>' . "\n\t" ;
			echo '<p class="group inner list-group-item-text">' . utf8_encode($games['description_game']) . '</p>' . "\n\t" ;
			echo '<div class="row">' . "\n\t";
			echo '<div class="col-xs-12 col-md-6">' . "\n\t";
			echo '<p class="lead">' . $games['price'] . ' €</p>' . "\n\t" ;
			echo '<div class="col-xs-12 col-md-6">' . "\n\t";
			echo '<a class="btn btn-success addtcart" href="cart.php?id=' . $games['id_game'] . '">Ajouter au panier</a>';
			echo '</div>' . "\n" . '</div>' . "\n" . '</div>' . "\n" . '</div>' . "\n" . '</div>' . "\n" . '</div>' . "\n";
		}
	}
?>