<?php
session_start();
include_once("../database/Conexao.php");

include_once('../HTML/Menu_Externo.php');

?>

<link rel="stylesheet" href="../CSS/style.css">

<div id="formulario">
    <form action="cadastro_banco.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="senha" placeholder="Senha">
        <input type="email" name="email" placeholder="Email">
        <input type="tel" name="telefone" placeholder="Telefone">
        <button type="submit">Cadastrar</button>
        
    </form>
</div>