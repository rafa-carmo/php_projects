<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include_once("../database/Conexao.php");

echo "<hr><h1><center> Resultado da Consulta ao Projeto: </center></h1><hr>";

$nome = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha = md5($senha);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$dataC = new DateTime();


$dataC = $dataC->format('Y-m-d H:i:s');

$Result_Consulta = "INSERT INTO usuario (nome, senha, email, telefone, dtCriacao) VALUES ('$nome', '$senha', '$email', '$tel', '$dataC')";

$Resultado_Consulta = mysqli_query($conn, $Result_Consulta);


$id = mysqli_insert_id($conn);
if (mysqli_insert_id($conn))

{
	$sql = "SELECT * FROM usuario WHERE id = '$id'";
	$result = $conn -> query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
	$_SESSION['nome'] = $row['nome'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['telefone'] = $row['telefone'];
		}}

	header("location: ..\listar");
}

else

{

	header("location: ..\listar");
}	


?>