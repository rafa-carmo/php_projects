<?php
session_start();

include_once("../database/Conexao.php");
$id = $_SESSION['id'];


$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha = md5($senha);
$senha_nova = filter_input(INPUT_POST, 'senhaNova', FILTER_SANITIZE_STRING);
$senha_repete = filter_input(INPUT_POST, 'senhaRepete', FILTER_SANITIZE_STRING);

if(trim($senha_nova) == '' || trim($senha_repete) == '') {
    
    header("Location: pass.php");
}

$senha_nova = md5($senha_nova);

$sql = "SELECT * FROM usuario WHERE id = '$id'";
$result = $conn -> query($sql);
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

        if($senha == $row['senha']){
            $update_pass = "UPDATE usuario set senha='$senha_nova' WHERE id=$id";
            
            $update = mysqli_query($conn, $update_pass);
            

            header("location: ../listar");
            }else{
                header("Location: pass.php");
            }
    
        }

    }else{
            header("Location: pass.php");
        }

