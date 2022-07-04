<?php
include("db.php");
if(isset($_POST['email']) || isset($_POST['senha'])){

  if(strlen($_POST['email']) == 0){
        echo "<h3>Preencha seu e-mail</h3>";
     }else if (strlen($_POST['senha']) == 0){
           echo "<h3>Preencha sua senha</h3>";
     } else {
           $email = $mysqli->real_escape_string($_POST['email']);
           $senha = $mysqli->real_escape_string($_POST['senha']);

           $sql_code =  "SELECT * FROM usuario WHERE email ='$email' AND senha ='$senha'";
           
           $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL " . $mysqli->error);

           $quantidade = $sql_query->num_rows;
           if($quantidade ==1) {

              $usuario = $sql_query->fetch_assoc();

                 if(!isset($_SESSION)){
                    session_start();
                 }

                 $_SESSION['usuario'] = $usuario['id'];
                 $_SESSION['nome'] = $usuario['nome'];

                 header("Location: pub.php");
                 

           }else{
              echo "<h3>Falha ao logar! E-mail ou senha incorretos</h3>";
           }
     }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Social Friends</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css"/>
    <link rel="icon" type="imagem/png" href="imagem/SocialFriends_1.ico"/>
</head>
<body>
         <div>
        <img src="imagem/SocialFriends_1.png">
        <h2>Acessar Conta</h2>
        <form action="" method="POST">
            <input type="email" placeholder="Endereço de Email" name="email"><br>
            <input type="password"  placeholder="Palavra-Passe" name="senha"><br>
            <input type="submit" value="Entrar" name="entrar">
        </form>
        <h3>Ainda não tem conta?
         <a href="registrar.php">Cadastre-se</a>
        </h3>
        </div>
      
   <?php
   
?>
        <script type="text/javacript" src="./js/js.js"></script>
</body>
</html>