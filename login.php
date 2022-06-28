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

                  
                     header("Location: arquivos/arquivos.php");

               }else{
                  echo "<h3>Falha ao logar! E-mail ou senha incorretos</h3>";
               }
         }

      }


      //if(isset($_POST['entrar'])){
        // $email = $_POST['email'];
        // $pass = $_POST['pass'];
         //$verifica = mysqli_query($mysqli, "SELECT * FROM usuario WHERE email = '$email' AND  password= '$pass'");

         //   if(mysqli_num_rows ($verifica) <=0){
           //    echo "<h3>Palavra-Passa ou e-mail incorreto</h3>";
            //}else{
             //  setcookie("login", $email);
              // header("location: ./");
            //}
      //}
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Social Friends</title>
    <style type="text/css">
        *{
            font-family: 'Montserrat', cursive;
        }
         img{
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 200px;
         }
         form {
            text-align: center;
            margin-top: 20px;
         }
         input[type="email"]{
            border: 1px, solid #CCC;
            width: 250px;
            height: 25px;
            padding-left: 10px;
            border-radius: 10px;
         }
         input[type="password"]{
            border: 1px, solid #CCC;
            width: 250px;
            height: 25px;
            padding-left: 10px;
            margin-top: 10px;
            border-radius: 10px;
         }
         input[type="submit"]{
            border: none;
            width: 90px;
            height: 25px;
            margin-top: 20px;
            padding: 5px;
            border-radius: 10px;
            background: #CCC;
         }
         input[type="submit"]:hover {
               background-color:#1E90FF;
               cursor:pointer;
         }
         h2{
            text-align: center;
            margin-top: 30px;
         } 
         h3{
            text-align: center;
            color: red;
            margin-top: 15px;
         }
         h1{
            text-align: center;
            font-size: 50px;
            color: green;
         }
    </style>

</head>
<body>
        <img src="_img/SocialFriends.png">
        <h2>Acessar Conta</h2>
        <form action="" method="POST">
            <input type="email" placeholder="Endereço de Email" name="email"><br>
            <input type="password" placeholder="Palavra-Passe" name="senha"><br>
            <input type="submit" value="Entrar" name="entrar">
        </form>
        <h3>Ainda não tens conta?
         <a href="registrar.php">Criar uma conta</a>
        </h3>
</body>
</html>