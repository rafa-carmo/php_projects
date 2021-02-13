<?php


    password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
<body>

<?php
    include_once('../HTML/Menu_Externo.php')
?>

<center>
    
<form action="login.php" method="post">
    <b>Login de Usuario</b>
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="senha" placeholder="senha">
    <button type="submit">Entrar</button>
</form>
</center>
</body>
</html>