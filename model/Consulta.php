<?php

	/**
	 * Classe para consulta
	 */
	include('Conexao.php');

	class Consulta
	{
		private $nucpf;
		private $nucart;


		public function consultaCpf($nucpf)
		{
			$this->nucpf = $nucpf;
			
			$sql = "SELECT * FROM TABELA";
			
			//INSTANCIA DA CLASSE CONEXÃO

			$conexao = new Conexao();

			$resultado = $conexao->execQuery($sql);

			$row = db2_fetch_array($resultado);

			if ($row > 0)
			{

				while ($row)
				{
					if (date('d/m/Y', strtotime($row[4])) >= date('d/m/Y'))
					{
						$status = "CADASTRO OK";
					}
					else
					{
						$status = "CADASTRO VENCIDO";	
					}

					return "<tbody><tr><td>".utf8_encode($row[0])."</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>".utf8_encode($row[3])."</td><td>".utf8_encode($status)."</td></tr></tbody>";

				}
			}
			else
			{
				echo "<script>alert('CPF NÃO ENCONTRADO!')</script>";
			}

			//FECHA A CONEXÃO
			$conexao->closeConnect();	

		}

		public function consultaHabilitacao($nucart)
		{
			$this->nucart = $nucart;

			$sql = "SELECT * FROM TABELA";

			//INSTANCIA DA CLASSE CONEXÃO

			$conexao = new Conexao();

			$resultado = $conexao->execQuery($sql);

			$row = db2_fetch_array($resultado);
			
			if ($row > 0)
			{
				while ($row)
				{
					if (date('d/m/Y', strtotime($row[4])) >= date('d/m/Y'))
					{
						$status = "CADASTRO OK";
					}
					else
					{
						$status = "CADASTRO VENCIDO";	
					}

					return "<tbody><tr><td>".utf8_encode($row[0])."</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>".utf8_encode($row[3])."</td><td>".utf8_encode($status)."</td></tr></tbody>";

				}
				
			}
			else
			{
				echo "<script>alert('CARTEIRINHA NÃO ENCONTRADA!')</script>";
			}

			//FECHA A CONEXÃO
			$conexao->closeConnect();

		}
	}
