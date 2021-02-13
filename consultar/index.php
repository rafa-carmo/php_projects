<?php
session_start();

?>
	<title>CRUD - CONSULTAR  DINFO</title>
	<link href="style.css" rel="stylesheet">

	<?php
		include_once("..\HTML\Menu_Externo.php");
	?>
<center>
	<hr><h1> CONSULTAR - DINFO: </h1><hr> 
</center>
	<?php
		
		if(isset($_SESSION['msg']))
		{
		   echo $_SESSION['msg'];
		   unset($_SESSION['msg']);
		}

	?>

			

	<div id="conteudo">
	<h3>Área de Consulta:</h3>
	<form method="POST" action="pesquisa.php">

	 <label class="div02" for="Pesquisar">Escolha uma Opção:</label>

	 <div class="options">
			<input type="radio" name="Pesquisar" value="Todos">
			<label for="Todos">Todos</label><br>
			<input type="radio" name="Pesquisar" value="Usuarios">
			<label for="Usuarios">Usuarios</label><br>
			<input type="radio" name="Pesquisar" value="Projetos">
			<label for="Projetos">Projetos</label><br>
			<input type="radio" name="Pesquisar" value="Atividades">
			<label for="Atividades">Atividades</label><br>
	</div>
  <!--CAMPO DE TEXTO PARA PESQUISA DO RESPONSÁVEL-->
  <input type="text" name="Busca" placeholder="Faça Sua Consulta Aqui!"><br><br>


<!--BOTÃO DE BUSCA-->
<button type="submit">Consultar</button>
	

</div>

