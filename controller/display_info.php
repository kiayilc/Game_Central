<!-- Affichage informations utilisateur -->
<?php
	function	display_info()
	{
		$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
		
		/* Informations utilisateur */
		$stmt = $conn->prepare("SELECT * FROM gc_customers WHERE id_customer = :r_customer");
		$stmt->execute(array(
			'r_customer' => $_SESSION['id_customer']
		));
		$res = $stmt->fetch();
		echo '<section class="customer"><fieldset><legend>Mes informations:</legend><br /><div class="form-group"> <label>Nom :</label> ' . $res['lastname_customer'] . '</div>';
		echo '<div class="form-group"> <label>Prénom :</label> ' . $res['firstname_customer'] . '</p></div>';
		echo '<div class="form-group"> <label>Date de naissance :</label> ' . $res['birthday'] . '</p></div>';
		echo '<div class="form-group"> <label>Email :</label> ' . $res['mail'] . '</p></div>';
		echo '<div class="form-group"> <label>Numéro de téléphone :</label> ' . $res['phone'] . '</p></div>';
		echo '<div class="form-group"> <label>Adresse :</label> ' . $res['address'] . '</p></div>';
		echo '<div class="form-group"> <label>Code postal :</label> ' . $res['postal_code'] . '</p></div>';
		echo '<div class="form-group"> <label>Ville :</label> ' . $res['city'] . '</p></div>';
		echo '<div class="form-group"> <label>Adresse de facturation :</label> ' . $res['delivery_address'] . '</p></div>';
		echo '<div class="form-group"> <label>Code postal :</label> ' . $res['delivery_postal_code'] . '</p></div>';
		echo '<div class="form-group"> <label>Ville :</label> ' . $res['delivery_city'] . '</p></div>';
		echo '<div class="form-group"> <label>Adresse de livraison :</label> ' . $res['shipping_address'] . '</p></div>';
		echo '<div class="form-group"> <label>Code postal :</label> ' . $res['shipping_postal_code'] . '</p></div>';
		echo '<div class="form-group"> <label>Ville :</label> ' . $res['shipping_city'] . '</p></div></fieldset></section>';
		$stmt->closeCursor();

		/* Informations carte de paiement */
		$stmt = $conn->prepare("SELECT * FROM gc_cards WHERE id_customer = :r_customer");
		$stmt->execute(array(
			'r_customer' => $_SESSION['id_customer']
		));
		$res = $stmt->fetch();
		if ($res['card_number'] == "")
			$card_number = "";
		else
			$card_number = "*********" . substr($res['card_number'],9);
		echo '<section class="card"><fieldset><legend>Les informations de ma carte:</legend><br /><div class="form-group"> <label>Nom :</label> ' . $res['lastname_customer'] . '</div>';
		echo '<div class="form-group"> <label>Prénom :</label> ' . $res['firstname_customer'] . '</p></div>';
		echo '<div class="form-group"> <label>Type de carte :</label> ' . $res['card_type'] . '</p></div>';
		echo '<div class="form-group"> <label>Numéro de carte :</label> ' . $card_number . '</p></div>';
		echo '<div class="form-group"> <label>Cryptogramme :</label> ' . $res['cryptogram'] . '</p></div>';
		echo '<div class="form-group"> <label>Date d\'expiration :</label> ' . $res['expiring_date'] . '</p></div></fieldset>';
		echo '<script>
		function confirmation() {
			if (confirm("Voulez vous vraiment vous désinscrire ?") == true)
			{
				document.location.replace("../model/delete_account.php");
			} 
			else 
			{
			document.location.replace("../view/account.php");
			}
		}</script>';
		echo '<a href="modif_account.php">Modifier mes informations</a><br><br><a href="#" onclick="confirmation()">Supprimer mon compte</a></section>';
		$stmt->closeCursor();
	}
?>