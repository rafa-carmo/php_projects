<?php
session_start();
include_once("../database/Conexao.php");


$login = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(!$login || !$senha)
{
	history.go(-1);
	
}
$senha = md5($senha);
$sql = "SELECT * FROM usuario WHERE nome = '$login'";
$result = $conn -> query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row['senha'] == $senha) {
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['telefone'] = $row['telefone'];
            header("Location: ../listar");
        }
    }
  } else {
    echo "0 results";
  }
?>