<?php 
    session_start();
    
    include("../database/require.php");

    include_once("..\database\Conexao.php");


    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $result_usuario = "SELECT * FROM usuario WHERE id = '$id'";
    $result = $conn -> query($result_usuario);
    		include_once("..\HTML\Menu_Externo.php");
    

?>
<link rel="stylesheet" href="style.css">
<div id="container">
<?php

    if ($result->num_rows > 0) {
        
        echo "<ul id='detalhes'>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $id = $row['id']; 
            $nome = $row['nome'];

            echo "<li><b>Id do usuario</b> $id</li>";
            echo "<li><b>Nome:</b> $nome</li>";

    }
    }
    else{
        header('location: ../listar');
    }
    ?>
    <div id="atividades-container">

    <div id="top-atividades">
        Minhas Atividades
        <ul>

<li>
    <div class="atividade">Atividade</div>
    <div class="observacao">Observações</div>
    <div class="dataPrev">Data Prevista</div>
    <div class="status">Status</div>
</li>
<?php
    $Result_Tbatividade = "SELECT * FROM tabela_atividades_projeto WHERE Fk_ID_Usuario = $id";
    $result = $conn -> query($Result_Tbatividade);
    if ($result->num_rows > 0) {
        


        while($atividade = $result->fetch_assoc()) {

          
            $datePrev = strtotime($atividade['dtConcPrev']);
            $prev = date('d/m/Y', $datePrev);
            
            $id_projeto = $atividade['FK_ID_Projeto'];
 
                    if ($atividade['dtConcEfet'] != null){
                        $dateConc = strtotime($atividade['dtConcEfet']);
                        $conc = date('d/m/Y', $dateConc);

                        $concluido = true;
                    }else{
                        $concluido = false;
                    }
   
                    echo '<li>';

                        echo " <div class='atividade'><a href='../detalhe?id=$id_projeto'>".$atividade['Nome_Ativ']."</a></div>";
                        echo "<div class='observacao'> Observações </div>";
                        echo "<div class='dataPrev'>$prev</div>";
                        echo '<div class="status">';
                            echo $concluido ?   "Concluido" : "Pendente";
                        echo '</div>';
                    echo "</li>";
        }

    }

?>
</ul>
</div>
</div>