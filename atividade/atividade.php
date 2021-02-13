<?php
    session_start();
    include_once("..\database\Conexao.php");
    if (!isset($_GET['id'])){
        header('location: ../listar');
    }
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../detalhe/style.css">
    <title>Criar Atividade</title>
</head>
<body>
<?php
    		include_once("..\HTML\Menu_Externo.php");
?>
<div id="atividades-container">

<form action="criarAtividade.php" method="post">
<b>Nome da atividade</b>
<input type="text" name="Nome_Ativ" placeholder="Nome da Atividade">
<input type="hidden" name="FK_Id_Projeto" value="<?php echo $id;?>">
<b>Data prevista para terminar</b>
<input type="date" name="dtConcPrev">
<b>Descrição da atividade</b>
<input type="text" name="descicao" placeholder="Descrição da atividade">
<button type="submit"> Cadastrar </button>
</form>
</div>
</body>
</html>