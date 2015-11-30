<?php
	include "../controller/headers.php";

	$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	if (is_Not_Null($_POST["email"]))
	{
		$stmt = $conn->prepare("SELECT pwd FROM gc_customers WHERE mail = :r_mail"); 	
		$stmt->execute(array(
			'r_mail' => $_POST['email'],
		));
		$res = $stmt->fetch();
		if ($res == false)
		{
			echo '<script>alert("Ce compte n\'existe pas!")</script>'; 
			header('Refresh: 0; URL=../view/recover_pwd.php');
		}
		else
		{
			$mail = $_POST['email'];
			$subject = "Mot de passe oublié";
			$msg = "Bonjour vous avez oublié votre mot de passe le voici : " . md5($res['pwd']);
			mail($mail,$subject,$msg);
			header ('Location: ../view/login.php');
		}
	}
	else
	{
		echo '<script>alert("'. utf8_decode("Veuillez entrer votre mail s'il vous plait.") .'")</script>'; 
		header('Refresh: 0; URL=../view/recover_pwd.php');
	}
?>