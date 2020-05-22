<?php

	//CHAMADA DE FUNÇÃO PARA VALIDAÇÃO DE CPF

	include('valida-cpf.php');

	//FUNÇÃO PARA CONSULTA DE CPF E CARTEIRAS DO SESC

	function returnConsulta($nureg, $opcao)
	{

		if ($opcao == 1 && isset($nureg))
		{
			
			//atribuindo a variavel nureg a variável nucpf

			$nucpf = $nureg;

			//CHAMANDO A FUNÇÃO PARA VALIDAR O CPF

			try 
			{

				valida_cpf($nucpf);

			} 
			catch (Exception $e) 
			{

				return $e->getMessage();

				return false;

			}
			
			//remove tudo que não for número do CPF inserido

			$nucpf = preg_replace( '/[^0-9]/is', '', $nucpf );

			//instancia da classe Consulta

			$consulta = new Consulta();

			try {

				$consulta->consultaCpf($nucpf);

			} catch (Exception $e) {

				return $e->getMessage();

				return false;
			}

			return $consulta->consultaCpf($nucpf);


		}
		elseif ($opcao == 2 && isset($nureg))
		{
				
			//atribuindo a variavel nureg a variável nucpf

			$nucart = $nureg;


			//instancia da classe Consulta

			$consulta = new Consulta();

			try {
				
				$consulta->consultaHabilitacao($nucart);

			} 
			catch (Exception $e) 
			{

				return $e->getMessage();
				
				return false;

			}

			return $consulta->consultaHabilitacao($nucart);

		}
	}
