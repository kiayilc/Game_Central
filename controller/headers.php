<?php
	/* Connexion à la base de données */
	if (!session_start())
	{
		session_start();
	}
	
	require_once '../model/class/cart.class.php';
	require_once '../model/class/db_connect.class.php';

	/* Includes des fichiers controller et model */
	require_once "../controller/settings.inc.php";
	require_once "../model/db_connect.php";
	
	$DB		= new DB_connect();
	$CART	= new Cart($DB);
	
	include_once "../model/product_list.php";
	include_once "../model/select_category.php";
	include_once "../model/select_editor.php";
	
	include_once "../controller/is_connect.php";
	include_once "../controller/display_info.php";
	include_once "../controller/modif_info.php";
	include_once "../controller/not_null.php";
	include_once "../controller/regex.php";
?>