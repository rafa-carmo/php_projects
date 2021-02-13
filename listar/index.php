<?php
session_start();
include_once("..\database\Conexao.php");
include("../database/require.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--meta charset para utilização de caracteres especiais-->
	<meta charset="utf-8">
	<title>CRUD - CONSULTAR PROJETO DINFO</title>
	<link href="estilo.css" rel="stylesheet">

</head>

<body>
	<?php
		include_once("..\HTML\Menu_Externo.php");
	?>
	<center>
	<hr><h1> Consulta Projeto - DINFO: </h1><hr> 
	<div id="conteudo">
			
			<div id="tabela">
				<ul>
	<?php
		
		if(isset($_SESSION['msg']))
		
		{
		   echo $_SESSION['msg'];
		   unset($_SESSION['msg']);
		}

		// CRIAÇÃO DA QUERY PARA SELECIONAR TODOS OS DADOS DA TABELA_PROJETOS.
		$Result_Tbprojetos = "SELECT * FROM tabela_projetos";
		$Resultado_Tbprojetos = mysqli_query($conn, $Result_Tbprojetos);

		// CRIAÇÃO DE UM WHILE PARA PERCORRER CADA LINHA DAS COLUNAS:
		while($row_tabela_projetos = mysqli_fetch_assoc($Resultado_Tbprojetos))
		

		{ // RETORNO DOS DADOS LINHA POR LINHA:

		$date = strtotime( $row_tabela_projetos['dtAbertura'] );
		$showdate = date('d/m/Y', $date);
		$id = $row_tabela_projetos['ID_Projeto'];
		?>

				<a href="../detalhe?id=<?php echo $id; ?>">
					<li class="tabela-linha" style=" <?php if($row_tabela_projetos['dtConclusao']){echo 'background-color: green; color: #f8f8f8'; } ?>">
				<?php
					
					echo '<div><b>Nome do Projeto: </b> <p id="nome"> ' . $row_tabela_projetos['nomeProjeto'].'</div>';
					echo '<div><b>Descrição:</b> <p id="descricao">' . $row_tabela_projetos['descricao'].'</div>';
					//echo 'Responsável: ' . $row_tabela_projetos['responsavel'] . "<br>";
					echo '<div><b>Data de Abertura: </b> <p>	' . $showdate . '</div>';
					
				?>	
					</li>
					</a>
				
		<?php
		}

	?>
		</ul>
	</div>
		</div>
	<br><br>
	
</center>
</body>
</html>

