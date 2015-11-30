<?php

/**
*
* An object that make connexion to the host
* @defaul localhost
*
*/

class			DB_connect
{
	private		$host		= 'localhost';
	private		$user		= 'root';
	private		$password	= '';
	private		$dataBase	= 'game_central';
	private		$connexion;

	public		function	__construct($host = null, $user = null, $password = null, $dataBase = null)
	{
		if ($host != null)
		{
			$this->host		= $host;
			$this->user		= $user;
			$this->password	= $password;
			$this->dataBase	= $dataBase;
		}

		try
		{
			$this->connexion =  new PDO("mysql:host={$this->host};dbname={$this->dataBase}", $this->user, $this->password, array(
				PDO::MYSQL_ATTR_INIT_COMMAND	=>	'SET NAMES UTF8',
				PDO::ATTR_ERRMODE				=>	PDO::ERRMODE_WARNING
				));
		}
		catch (PDOException $e)
		{
			echo '<h3>..Connect Error..<h3>'. $e->getMessage();
		}
	}

	public		function	m_db_query($sql, $var = array())
	{
		$query	= $this->connexion->prepare($sql);
		$query->execute($var);

		return	($query->fetchAll(PDO::FETCH_OBJ));
	}
}