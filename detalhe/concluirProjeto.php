<?php 
session_start();
include_once("..\database\Conexao.php");
include("../database/require.php");
$id_user = $_SESSION['id'];
$id = $_GET['id'];


$Result_TbProjeto = "SELECT * FROM tabela_projetos WHERE ID_Projeto = $id";
$result = $conn -> query($Result_TbProjeto);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        if( $row['responsavel'] == $id_user) {
            $date = new DateTime();
            $date = $date->format('Y-m-d H:i:s');
            
            $update_TbProjeto = "UPDATE tabela_projetos set dtConclusao='$date' WHERE ID_Projeto=$id";
            
            $update = mysqli_query($conn, $update_TbProjeto);


            if ($update){
                

                    header("location: .\?id=$id_projeto");
                
            }
            else{
                header("location: .\?id=$id_projeto");
            }
        }
    }
}