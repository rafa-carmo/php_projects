<?php
session_start();
?>
	<title>Alterar Senha</title>
	<link href="style.css" rel="stylesheet">

	<?php
		include_once("..\HTML\Menu_Externo.php");
	?>

    
<link rel="stylesheet" href="../CSS/style.css">

<div id="formulario">
    
    <form action="troca_senha.php" method="post">
    <b>Alterar senha</b>
        <input type="password" name="senha" placeholder="Senha Atual">
        
        <input type="password" name="senhaNova" placeholder="Senha Nova">
        
        <input type="password" name="senhaRepete" placeholder="Repetir Senha Nova">
        <button type="submit">Alterar</button>
        
    </form>
</div>
