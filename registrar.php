<?php
/*
    include("db.php");

    if(count($_POST) > 0) {
    //if(isset($_POST["criar"])) {
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data = date("Y-m-d");
$mysqli->query ("INSERT INTO usuario (nome, apelido, email, senha, data) VALUES ('{$nome}','{$apelido}','{$email}','{$senha}','{$data}')");  
     

//$email_check = mysqli_query("SELECT email FROM usuario WHERE email ='$email'");
// $sql_code =  "SELECT email FROM usuario WHERE email ='$email'";
//$do_email_check = mysqli_num_rows($email_check);


 
            if($do_email_check >=1){
                echo "<h3>Este email já foi registrado</h3>";
            }elseif($nome == '' or strlen($nome)<3){
                echo "escreva o teu nome corretamente";
            }elseif($email == '' or strlen($emaile)<10){
                echo "escreva o teu email corretamente";
            }elseif($senha == '' or strlen($senha)<3){
                echo "escreva o tua senha corretamente";
            }else{
                 
            }
        

        //$sql_code =  "SELECT * FROM usuario WHERE email ='$email' AND senha ='$senha'";
    }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Registrar -Social Friends</title>
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
         input[type="text"]{
            border: 1px, solid #CCC;
            width: 250px;
            height: 25px;
            padding-left: 10px;
            border-radius: 10px;
            margin-top: 10px;
         }
         input[type="email"]{
            border: 1px, solid #CCC;
            width: 250px;
            height: 25px;
            padding-left: 10px;
            border-radius: 10px;
            margin-top: 10px;
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
            width: 125px;
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
         a{
            text-decoration: none;
            color: #333;
         }
    </style>

</head>
<body>
        <img src="_img/SocialFriends.png">
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