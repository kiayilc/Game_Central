<?php
/*
* @server
*/
define('_DB_SERVER_', 'localhost');
define('_DB_NAME_', 'game_central');
define('_DB_USER_', 'root');
define('_DB_PASSWD_', '');

/*
* Requêtes SQL
*/

/* Sélectionner catégorie */
define('_SL_CATEGORY_', 'SELECT
							name_cat			AS name
						FROM
							gc_category'
		);

/* Sélectionner éditeur */
define('_SL_EDITOR_', 'SELECT
							name_editor			AS name
						FROM
							gc_editor'
		);

/* Afficher tous les produits */
define('_SC_PRODUCTS_', 'SELECT *
						FROM
							gc_games'
		);

/* Afficher produits par catégorie */
define('_SC_CATEGORY_', 'SELECT *
						FROM
							gc_games, gc_category, gc_rel_game_cat
						WHERE
							gc_games.id_game		= gc_rel_game_cat.id_game
						AND
							gc_category.id_cat		= gc_rel_game_cat.id_cat
						AND
							gc_category.name_cat	= :r_cat'
		);

/* Afficher produits par éditeur */
define('_SC_EDITOR_', 'SELECT *
						FROM
							gc_games, gc_editor, gc_rel_game_editor
						WHERE
							gc_games.id_game 		= gc_rel_game_editor.id_game
						AND
							gc_editor.id_editor		= gc_rel_game_editor.id_editor
						AND
							gc_editor.name_editor	= :r_editor'
		);

/* Afficher produits par prix croissant */
define('_SC_ASC_PRICE_', 'SELECT *
						FROM
							gc_games
						ORDER BY
							price
						ASC'
		);

/* Afficher produits par prix décroissant */
define('_SC_DESC_PRICE_', 'SELECT *
						FROM
							gc_games
						ORDER BY
							price
						DESC'
		);

/* Inscription utilisateur */
define('_DB_SIGNUP_', 'INSERT INTO gc_customers (firstname_customer,
													lastname_customer,
													birthday,
													mail,
													phone,
													pwd,
													address,
													delivery_address,
													shipping_address,
													postal_code)
						VALUES (:r_firstname,
								:r_lastname,
								:r_birthday,
								:r_mail,
								:r_phone,
								:r_pwd,
								:r_address,
								:r_address,
								:r_address,
								:r_postal)'
	);

/* Modification informations utilisateur */
define('_DB_UPDATE_', 'UPDATE gc_customers
						SET
							mail				=	:r_mail,
							pwd					=	:r_pwd,
							phone				=	:r_phone,
							address				=	:r_address,
							delivery_address	=	:r_delivery_address,
							shipping_address	=	:r_shipping_address,
							postal_code			=	:r_postal_code
						WHERE
							id_customer			=	:r_customer'
		);

/* Selection de tout les jeux présents dans la table gc_games */
define('_GC_GAMES_', 'SELECT
						id_game				AS id,
						name_game			AS name,
						description_game	AS description,
						price				AS price,
						image				AS src,
						game_console		AS console,
						release_date		AS released_on
					FROM
						gc_games'
		);

define('_DB_SELECT_ID_GAME_', 'SELECT
									id_game	AS id
								FROM
									gc_games
								WHERE
									id_game		= :id'
		);

/*
* Constant variables

if (isset($_POST['firstname'])
	|| isset($_POST['lastname'])
	|| isset($_POST['birthday'])
	|| isset($_POST['phone'])
	|| isset($_POST['address'])
	|| isset($_POST['postal'])
	|| isset($_POST['email'])
	|| isset($_POST['pwd'])
	|| isset($_POST['pwdd2'])
	|| isset($_POST['customer'])
	|| isset($_POST['description_game'])
	|| isset($_POST['shipping_address'])
	)
{
	define('_FIRSTNAME_', $_POST['firstname']);
	define('_LASTNAME_', $_POST['lastname']);
	define('_BIRTHDAY_', $_POST['birthday']);
	define('_PHONE_', $_POST['phone']);
	define('_ADDRESS_', $_POST['address']);
	define('_CD_', $_POST['postal']);
	define('_MAIL_', $_POST['email']);
	define('_PWD_', $_POST['pwd']);
	define('_PWD2_', $_POST['pwd2']);
	define('_CUSTOMER_', $_GET['customer']);
	define('_DELIVERY_ADDRESS_', $_GET['delivery_address']);
	define('_SHIPPING_ADDRESS_', $_GET['shipping_address']);
}

define('__', $_GET['']);*/