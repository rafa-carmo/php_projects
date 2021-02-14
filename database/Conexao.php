<?php
include('../config.php');
$Servidor = $_ENV['SERVERNAME'];
$Usuario = $_ENV['USERNAME'];
$Senha = $_ENV["PASSWORD"];
$Dbname = $_ENV['DBNAME'];



// CRIAR A CONEXÃO:
$conn = mysqli_connect($Servidor, $Usuario, $Senha, $Dbname);



?>