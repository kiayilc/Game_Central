<!-- Modification des informations utilisateur -->
<?php
function	modif_info()
{
	$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	
	/* Informations utilisateur */
	$stmt = $conn->prepare("SELECT * FROM gc_customers WHERE id_customer = :r_customer");
	$stmt->execute(array(
		'r_customer' => $_SESSION['id_customer']
	));
	$res = $stmt->fetch();
	echo '<section class="customer"><fieldset><legend>Mes informations:</legend><br />';
	echo '<div class="form-group"><label>Numéro de téléphone : </label><input type="text" name="phone" value="' . $res['phone'] . '" maxlength="10"></div>';
	echo '<div class="form-group"><label>Adresse : </label><input type="text" name="address" value="' . $res['address'] . '"></div>';
	echo '<div class="form-group"><label>Code postal : </label><input type="text" name="postal" value="' . $res['postal_code'] . '" maxlength="5"></div>';
	echo '<div class="form-group"><label>Ville : </label><input type="text" name="city" value="' . $res['city'] . '"></div>';
	echo '<div class="form-group"><label>Adresse de facturation : </label><input type="text" name="delivery_address" value="' . $res['delivery_address'] . '"></div>';
	echo '<div class="form-group"><label>Code postal : </label><input type="text" name="delivery_postal" value="' . $res['delivery_postal_code'] . '" maxlength="5"></div>';
	echo '<div class="form-group"><label>Ville : </label><input type="text" name="delivery_city" value="' . $res['delivery_city'] . '"></div>';
	echo '<div class="form-group"><label>Adresse de livraison : </label><input type="text" name="shipping_address" value="' . $res['shipping_address'] . '"></div>';
	echo '<div class="form-group"><label>Code postal : </label><input type="text" name="shipping_postal" value="' .  $res['shipping_postal_code'] . '" maxlength="5"></div>';
	echo '<div class="form-group"><label>Ville : </label><input type="text" name="shipping_city" value="' . $res['shipping_city'] . '"></div></fieldset></section>';
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
	echo '<section class="card"><fieldset><legend>Les informations de ma carte:</legend><br />';
	echo '<div class="form-group"><label>Nom : </label><input type="text" name="lastname" value="' . $res['lastname_customer'] . '"></div>';
	echo '<div class="form-group"><label>Prénom : </label><input type="text" name="firstname" value="' . $res['firstname_customer'] . '"></div>';
	echo '<div class="form-group"><label>Type de carte : </label><input type="text" name="card_type" value="' . $res['card_type'] . '"></div>';
	echo '<div class="form-group"><label>Numéro de carte : </label><input type="text" name="card_number" value="' . $card_number . '" maxlength="13"></div>';
	echo '<div class="form-group"><label>Cryptogramme : </label><input type="text" name="cryptogram" value="' . $res['cryptogram'] . '" maxlength="3"></div>';
	echo '<div class="form-group"><label>Date d\'expiration : </label><input type="text" name="expiring_date" value="' . $res['expiring_date'] . '" placeholder="mm-aaaa"></div>';
	echo '</fieldset><input type="reset" class="btn" onclick="self.location=\'../view/account.php\'" value="Annuler">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn" value="Modifier"></section>';
	$stmt->closeCursor();
}
?>