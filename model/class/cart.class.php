<?php
/**
* Adding games to cart
*/
class		Cart
{
	private	$dataBase;

	public	function			__construct($dataBase)
	{
		if (!isset($_SESSION))
		{
			session_start();
		}
		if (!isset($_SESSION['cart']))
		{
			$_SESSION['cart']	= array();
		}

		if (isset($_GET['deleletCart']))
		{
			$this->m_c_del_game($_GET['deleletCart']);
		}

		$this->dataBase			= $dataBase;
	}

	public	function			m_c_add_game($id_game)
	{
		if (isset($_SESSION['cart'][$id_game]))
		{
			$_SESSION['cart'][$id_game]++;
		}
		else
		{
			$_SESSION['cart'][$id_game] = 1;
		}
	}

	public	function			m_c_del_game($id_game)
	{
		unset($_SESSION['cart'][$id_game]);
	}

	public	function			m_c_order_subTotal()
	{
		$subTotalPrice				= 0;
		$id_game				= array_keys($_SESSION['cart']);

		if (empty($id_game))
		{
			$game_in_cart		= array();
		}
		else
		{
			$game_in_cart		= $this->dataBase->m_db_query('SELECT id_game AS id, price FROM gc_games WHERE id_game IN (' . implode(',', $id_game) .')');
		}
		$subTotalPrice = $game_in_cart->price * $_SESSION['cart'][$game->id];

		return ($subTotalPrice);
	}

	public	function			m_c_order_total()
	{
		$totalPrice				= 0;
		$id_game				= array_keys($_SESSION['cart']);

		if (empty($id_game))
		{
			$game_in_cart		= array();
		}
		else
		{
			$game_in_cart		= $this->dataBase->m_db_query('SELECT id_game AS id, price FROM gc_games WHERE id_game IN (' . implode(',', $id_game) .')');
		}

		foreach ($game_in_cart as $game)
		{
			$totalPrice += $game->price * $_SESSION['cart'][$game->id];
		}

		return ($totalPrice);
	}

	public	function			m_c_count_games_ordered()
	{
		return (array_sum($_SESSION['cart']));
	}
}