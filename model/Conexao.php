<?php

	/**
	 * Classe para conexão com o banco
	 */
	class Conexao
	{
		private $user = 'usuario';
		private $pwd = 'senha';
		private $bd = 'bancodedados';

		private $conn;
		
		function __construct()
		{
			$this->conn = db2_connect($this->bd, $this->user, $this->pwd);

			if ($this->conn) {
				return  $this->conn;
			}
			else
			{
				return die("Infelizmente não foi possível conectar ao Banco de Dados");
			}
		}

		public function execQuery($sql){
			$stmt = db2_prepare($this->conn, $sql);
			@db2_execute($stmt);

			return $stmt;
		}

		public function closeConnect()
		{
			db2_close($this->conn);
		}


	}