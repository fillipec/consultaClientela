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

			if (valida_cpf($nucpf))
			{
				//remove tudo que não for número do CPF inserido

				$nucpf = preg_replace( '/[^0-9]/is', '', $nucpf );

				//instancia da classe Consulta

				$consulta = new Consulta();

				echo $consulta->consultaCpf($nucpf);
			}
			else
			{
				return "<script>alert('CPF INVÁLIDO!')</script>";
			}

		}
		elseif ($opcao == 2 && isset($nureg))
		{
				
			//atribuindo a variavel nureg a variável nucpf

			$nucart = $nureg;


			//instancia da classe Consulta

			$consulta = new Consulta();

			echo $consulta->consultaHabilitacao($nucart);

		}
	}
