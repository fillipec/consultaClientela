<!DOCTYPE html>
<html>
	<head>

		<title>Consulta Clientela</title>
		
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="view/css/bootstrap-reboot.min.css">
		<link rel="stylesheet" type="text/css" href="view/css/bootstrap-grid.min.css">		

		<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
	    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	</head>
	<body>
		<!-- Cabeçalho -->
		<header>
			<div class="navbar navbar-light bg-light shadow-sm" >

				<h1>Consulta Clientela</h1>
				
			</div>
		</header>
		
		<!--chamada PHP inclusão de Classes e Funções -->


		<?php 

			include('control/return-consulta.php');
			include('model/Consulta.php');

		?>


		<!-- Formulário e Grid de exibição -->
		<main>
			<div class="container-fluid">

				<form class="form-inline" action="?a=pesquisar" method="post">
					<div class="form-group form-check form-check-inline">
					    <input class="form-check-input" type="radio" id="cpfCheck" name="opcao" value="1" checked>
					    <label class="form-check-label " for="cpfCheck">CPF</label>
					</div>
					<div class="form-group form-check form-check-inline">
					    <input class="form-check-input" type="radio" id="cartCheck" name="opcao" value="2">
					    <label class="form-check-label" for="cartCheck">Carteirinha do SESC</label>
					</div>
					<div class="form-group">
				    	<input type="text" class="form-control mb-2 mr-sm-2" id="inputReg" name="nureg" maxlength="14" required>
				  	</div>
				  	<div class="form-group">
						<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Enviar</button>
				  		<button type="reset" class="btn btn-warning mb-2 mr-sm-2" onclick="window.location.href='?a=limpar';">Limpar</button>	
				  	</div>

				</form>

			</div>

			<hr/>

			<div class="table-responsive">
				<table class='table'>
					<thead class='thead-light'>
						<th>NOME CLIENTE</th>
						<th>CATEGORIA</th>
						<th>EMPRESA</th>
						<th>UNIDADE OPERACIONAL</th>
						<th>STATUS</th>
					</thead>
					<?php 
						//Retorno da consulta.

						if(@$_GET['a'] == "pesquisar")
						{
							if ($_POST['nureg']=="")
							{
								echo "<script>alert('PREENCHA OS DADOS');</script>";
							}
							else
							{

								$nureg = $_POST['nureg'];
								$opcao = $_POST['opcao'];

								echo "<tbody><tr><td>".returnConsulta($nureg,$opcao)."</td></tr></tbody>";
							}
						}
						
					?>
				</table>
			</div>

		</main>
		<hr/>
		<!-- Rodapé -->
			<footer style="text-align: center;">
				Copyright &copy; - Desenvolvido pela GEINF - SESC-PE
				<!-- jQuery -->
			    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			    <!-- plugins compilados (js) -->
			    <script src="js/bootstrap.min.js"></script>
			</footer>
	</body>
</html>