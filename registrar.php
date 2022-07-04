<?php
//post > novoUsuario.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Registrar -Social Friends</title>
    <link rel="stylesheet" type="text/css" href="./css/registrar.css"/>
    <link rel="icon" type="imagem/png" href="imagem/SocialFriends_1.ico"/>

</head>
<body>
        <img src="imagem/SocialFriends_1.png">
        <h2>Criar Conta</h2>
        <form action="post/novoUsuario.php" method="POST">
            <input type="text" placeholder=" Primeiro Nome" name="nome"><br>
            <input type="text" placeholder="Apelido" name="apelido"><br>
            <input type="email" placeholder="Endereço Email" name="email"><br>
            <input type="password" placeholder="Palavra-Passe" name="senha"><br>
            <input type="submit" value="Criar uma conta" name="criar">
        </form>
        <h3>Já não tens conta?
         <a href="login.php">Entrar aqui!</a>
        </h3>
</body>
</html>