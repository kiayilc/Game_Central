<?php
	require "../controller/headers.php";

	$json = array('error' => true);

	if (isset($_GET['id']))
	{
		$game = $DB->m_db_query(_DB_SELECT_ID_GAME_, array('id'  => $_GET['id']));
		if (empty($game))
		{
			$json['message'] = "Ce jeu n'existe pas encore dans notre base de donnée";
		}

		$CART->m_c_add_game($game[0]->id);
		$json['error'] = false;
		$json['total'] = $CART->m_c_order_total();
		$json['nbGame'] = $CART->m_c_count_games_ordered();
		$json['message'] = 'Le jeu a bien été ajouté au panier.';
	}
	else
	{
		$json['message'] = "Une erreur s'est produite.";
	}

	echo json_encode($json);
?>
