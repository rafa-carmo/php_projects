<?php 

include_once('../config.php');
if (isset($_SESSION['id'])){
$id = $_SESSION['id'];
}
?>

		<title>Menu Externo</title> 
		<meta charset="utf-8">
		<link href="..\CSS\Estilo.css" rel="stylesheet">



<div id="header"> 
	<div id="menu">
		<div class="menu-content">
		<?php 
			

			echo "<a href='$home/cadastrar'> Cadastrar Projeto </a>";
			echo "<a href='$home/consultar'> Consultar Projeto </a>";
			echo "<a href='$home/listar'> Listar Todos os Projetos </a>";
		?>
		</div>

		<div class="menu-user">

		<?php
			if (isset($_SESSION['nome'])) {

				$nome = $_SESSION['nome']; 
			?>

				<div class="dropdown">

					<span>
						<?php echo $nome; ?>
					</span>
					<div class="dropdown-content">
						<a href=<?php echo "../user?id=$id"; ?>> Minhas Atividades </a>
						<a href="../signup/pass.php">Alterar Senha</a>
						<a href='../login/logout.php'> Logout </a>
					</div>
				</div>
		<?php
		}
		else{
				
			echo "<a href='$home/login'> Login </a>";
			echo "<a href='$home/signup'> Cadastrar </a>";
		}
		?>
		</div>

	</div>

</div>

