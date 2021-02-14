<?php
session_start();

include("../database/require.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--meta charset para utilização de caracteres especiais-->
	<meta charset="utf-8">
	<title>CRUD - CADASTRAR PROJETO DINFO</title>
	
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<?php
		include_once("..\HTML\Menu_Externo.php");

	?>
	<center>
	<hr><h1> CADASTRAR PROJETO - DINFO: </h1><hr> 
	<?php
		
		if(isset($_SESSION['msg']))
		{
		   echo $_SESSION['msg'];
		   unset($_SESSION['msg']);
		}

	?>
	<br><br>
	
	<form method="POST" action="..\database\Processa.php">
	

		<input type="text" name="Consulta_Projeto" placeholder="Digite o nome do Projeto">
		
		<input type="text" name="Consulta_Descricao" placeholder="Digite a Descrição">

		

		<button type="submit"> Cadastrar Projeto</button>

	</form>
</center>
</body>
</html>

