<?php

$Servidor = "localhost";
$Usuario = "root";
$Senha = "";
$Dbname = "projeto_dinfo";

// CRIAR A CONEXÃO:
$conn = mysqli_connect($Servidor, $Usuario, $Senha, $Dbname);


if (!isset($_SESSION['id'])){
    header("Location: ../login");
}

?>