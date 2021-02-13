<?php
session_start();
include_once("../database/Conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>PROCESSAMENTO PESQUISA:</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
include_once("../HTML/Menu_Externo.php");




function busca($termo, $tabela, $linhas = array(), $conexao) {
	if ($termo=='') {
		$termo = "SELECT * FROM $tabela";
	}else {
		
		
		if(count($linhas) > 1){

			$termosdebusca = array();
			foreach ($linhas as &$linha) {

				$termosdebusca[] = " $linha LIKE '%$termo%'";

			}
			$termo = "SELECT * FROM $tabela WHERE" .implode(' OR ', $termosdebusca) ; 
			
		}else{
			$termo = "SELECT * FROM $tabela WHERE $linhas[0] LIKE '%$termo%' " ; 
		}
		
	}


	return mysqli_query($conexao, $termo);
}


?>


<div id="resultado"> 

<?php

	// PESQUISA OS RESPONSÁVEIS PELO PROJETO NO BANCO:
	$Pesquisar = $_POST['Pesquisar'];
	$busca = $_POST['Busca'];




	if ($Pesquisar == "Todos" || $Pesquisar == "Projetos")
	{
		$resultado_projetos= busca($busca, "tabela_projetos", ['nomeProjeto', 'descricao'], $conn);
	}

 if ($Pesquisar == "Todos" ||  $Pesquisar == "Atividades")
	{
		$resultado_atividades= busca($busca, "tabela_atividades_projeto", ['Nome_Ativ'], $conn);
	}

if ($Pesquisar == "Todos" ||  $Pesquisar == "Usuarios")
	{
		$resultado_usuarios= busca($busca, "usuario", ['nome'], $conn);
	}



	
	// IF PROJETOS:
	if (isset($resultado_projetos))
	

	if ($resultado_projetos -> num_rows > 0 ) {
	 {

		echo "<br>";
		echo"<b>Resultado Projetos</b>";
		echo "<div id='projetos'>";
			while($rows_todos = mysqli_fetch_array($resultado_projetos))

			{
				$projeto = $rows_todos['nomeProjeto'];
				$descricao = $rows_todos['descricao'];
				$id_projeto = $rows_todos['ID_Projeto'];

				echo "<div class='projeto'>";

				echo "<div><b>Titulo: </b><a href='../detalhe?id=$id_projeto'> $projeto </a></div>";
				
				echo "<div class='projeto_conteudo'><b>Descrição: </b><p>$descricao</p></div>";
			
				echo "</div>";
			}

	}
	echo "</div>";
}
	
	
	// IF ATIVIDADES:
	if (isset($resultado_atividades))
	 {
		 if($resultado_atividades -> num_rows > 0){
		echo "<br>";
		echo "<b>Resultado Atividades</b>";
		echo "<div id='atividades'>";
		
		
			while($rows_todos = mysqli_fetch_array($resultado_atividades))
				
			
			{	
				$id_projeto = $rows_todos['FK_ID_Projeto'];
				$rows_todos['dtConcEfet'] ? $concluido = 'Concluido' : $concluido = "Pendente";

				echo "<a href='../detalhe/?id=$id_projeto'>";
				echo "<div id='atividade'>";
				echo "<div> <b>Atividade: </b>". $rows_todos['Nome_Ativ'] . "</div>";
				echo "<div> <b>Status: </b> $concluido </div>";
				echo "</div>";
				echo "</a>";
			}

				
	 }
	 echo "</div>";
	}

	 if (isset($resultado_usuarios)){
		echo $resultado_usuarios -> num_rows > 0 ? "<b>Resultado usuarios</b>" : " ";
		
		while($rows_todos = mysqli_fetch_array($resultado_usuarios))

		{

			$id = $rows_todos['id'];
			$nome = $rows_todos['nome'];
			echo "O usuario de id  $id é:  $nome <br>";
		
		}
	 }



?>



	</div>