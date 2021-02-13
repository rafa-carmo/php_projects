<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include("..\database\require.php");
include_once("Conexao.php");

echo "<hr><h1><center> Resultado da Consulta ao Projeto: </center></h1><hr>";

$ConsultaP = filter_input(INPUT_POST, 'Consulta_Projeto', FILTER_SANITIZE_STRING);
$ConsultaD = filter_input(INPUT_POST, 'Consulta_Descricao', FILTER_SANITIZE_STRING);
$ConsultaR = $_SESSION['id'];

$ConsultaA = new DateTime();
//$ConsultaA = filter_input(INPUT_POST, 'Consulta_Abertura', FILTER_SANITIZE_STRING);
$ConsultaA = $ConsultaA->format('Y-m-d H:i:s');

echo "<hr><center>";

echo "Consulta Projeto: $ConsultaP" . "<br>";
echo "Consulta Descrição: $ConsultaD" . "<br>";
echo "Consulta Responsável: $ConsultaR" . "<br>";
echo "Consulta Abertura: $ConsultaA" . "<br>";

echo "<hr></center>";



$Result_Consulta = "INSERT INTO tabela_projetos (nomeProjeto, descricao, responsavel, dtAbertura) VALUES ('$ConsultaP', '$ConsultaD', '$ConsultaR', '$ConsultaA')";

$Resultado_Consulta = mysqli_query($conn, $Result_Consulta);
$id = mysqli_insert_id($conn);
if (mysqli_insert_id($conn))

{
	
	header("location: ..\listar");
}

else

{

	header("location: ..\Cadastrar");
}	


?>