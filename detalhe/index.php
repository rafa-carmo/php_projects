<?php 
    session_start();
    if (!isset($_GET['id'])){
        header('location: ../listar');
    }
    include("../database/require.php");

    include_once("..\database\Conexao.php");
    $id_busca_projeto = $_GET['id'];

    $Result_Tbprojeto = "SELECT * FROM tabela_projetos WHERE ID_Projeto = '$id_busca_projeto'";
    $result = $conn -> query($Result_Tbprojeto);
    		include_once("..\HTML\Menu_Externo.php");
    

?>
<link rel="stylesheet" href="style.css">
<?php

    if ($result->num_rows > 0) {
        
        echo "<ul id='detalhes'>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $id_responsavel = $row['responsavel']; 
            $dateCriacao = strtotime( $row['dtAbertura'] );
            $criacao = date('d/m/Y', $dateCriacao);

            if(!$row['dtConclusao']) {
                $concluido = "Em andamento";
            }else {
                $dateConcluido = strtotime( $row['dtConclusao'] );
                $concluido = date('d/m/Y', $dateConcluido);

                

                
            }
            $nomeProjeto = $row['nomeProjeto'];
            $descricao = $row['descricao'];

            if ($id_responsavel == $_SESSION['id']) {
                $row['dtConclusao'] ? $linkConcluido=" " : $linkConcluido = "<a href='concluirProjeto.php?id=$id   '> Concluir Projeto</a> ";
            }else {
                $linkConcluido = " ";
            }
            
            echo $linkConcluido;

            echo "<li><b>Nome do projeto:</b> $nomeProjeto</li>";
           
            echo "<li><b>Data de Criação do projeto:</b> $criacao</li>";
            echo "<li><b>Data de conclusão:</b> $concluido </li>";

            $responsavel = $conn -> query("SELECT * FROM usuario WHERE id = $id_responsavel");
            while($dados = $responsavel->fetch_assoc()) {

                echo '<li><b>Responsavel pelo projeto: </b>'. $dados['nome']."</li>";

            }

            echo "<li><b>Descrição do projeto</b></li> <p>$descricao</p>";
            echo "</ul>";
    }
    }
    else{
        header('location: ../listar');
    }
    
?>

<div id="atividades-container">


<div id="top-atividades">
Atividades
<a href=<?php echo "../atividade/atividade.php?id=$id_busca_projeto"; ?> > Cadastrar nova atividade</a>
</div>
<?php 
$Result_TbAtividade = "SELECT * FROM tabela_atividades_projeto WHERE Fk_Id_Projeto = '$id_busca_projeto'";
$atividades = $conn -> query($Result_TbAtividade);
?>
<ul>

<li>
    <div class="atividade">Atividade</div>
    <div class="observacao">Observações</div>
    <div class="responsavel">Responsavel</div>
    <div class="status">Status</div>
</li>
    <?php

          if ($atividades->num_rows > 0) {
                

                // output data of each row
                while($atividade = $atividades->fetch_assoc()) {
                    
                    $id_usuario_atividade = $atividade['Fk_ID_Usuario'];
                    $responsavel = $conn -> query("SELECT nome, id FROM usuario WHERE id = $id_usuario_atividade");
                    $id_atividade = $atividade['ID_Ativ_Projeto'];
                    if ($atividade['dtConcEfet'] != null){
                        $concluido = true;
                    }else{
                        $concluido = false;
                    }
                    while($dados = $responsavel->fetch_assoc()) {
                        $nomeResponsavel = $dados['nome'];
                        $idResponsavelAtividade = $dados['id'];
                    }
                    echo '<li>';

                        echo " <div class='atividade'>".$atividade['Nome_Ativ']."</div>";
                        echo "<div class='observacao'>".$atividade['descricao']. "</div>";
                        echo " <div class='responsavel'>$nomeResponsavel</div>";
                        echo '<div class="status">';
                        if($idResponsavelAtividade == $_SESSION['id']){
                            
                            echo $concluido ?   "Concluido" : "<a href='../atividade/concluir.php?id=$id_atividade&&id_projeto=$id'> Concluir </a>";
                        
                        }else{
                            echo $concluido ? "Concluido" : "Pendente";
                        }
                        echo '</div>';
                    echo '</li>';

                }
            }else {
                    echo "<div class='nenhuma-atividade'>Nenhuma atividade registrada</div>";
                }
    ?>
</ul>
        </div>