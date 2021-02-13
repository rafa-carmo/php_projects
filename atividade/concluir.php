<?php 
session_start();
include_once("..\database\Conexao.php");
$id_user = $_SESSION['id'];
$id = $_GET['id'];
$id_projeto = $_GET['id_projeto'];

$Result_TbAtividade = "SELECT * FROM tabela_atividades_projeto WHERE ID_Ativ_Projeto = $id";
$result = $conn -> query($Result_TbAtividade);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        if( $row['Fk_ID_Usuario'] == $id_user) {
            $date = new DateTime();
            $date = $date->format('Y-m-d H:i:s');
            
            $update_TbAtividade = "UPDATE tabela_atividades_projeto set dtConcEfet='$date' WHERE ID_Ativ_Projeto=$id";
            
            $update = mysqli_query($conn, $update_TbAtividade);


            if ($update){
                

                    header("location: ..\detalhe\?id=$id_projeto");
                
            }
            else{
                header("location: ..\detalhe\?id=$id_projeto");
            }
        }
    }
}

?>