<?php
namespace Lib\DB;
class Banco_Agenda
{

	private $dsn = "mysql: host=localhost; dbname=Banco_Agenda";

	private $user = "root";

	private $pass = "";

	public function conectar()
	{
		try {
			$db = new \PDO($this->dsn, $this->user, $this->pass);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			return $db;


		} catch (\PDOException $e) {
			echo 'Falha ao Conectar com Banco de Dados: ' . $e->getMessage();

		}

	}
}
