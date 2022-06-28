<?php

include("../db.php");

//if(count($_POST) > 0) {
if(isset($_POST["criar"])) {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data = date("Y-m-d");

  //consulta mysql  
$mysqli->query ("INSERT INTO usuario (nome, apelido, email, senha, data) VALUES ('{$nome}','{$apelido}','{$email}','{$senha}','{$data}')");  
 

//$email_check = mysqli_query("SELECT email FROM usuario WHERE email ='$email'");

//$do_email_check = mysqli_num_rows($email_check);

      //  if($mysqli->query>=1){
       //     echo "<h3>Este email já foi registrado</h3>";
    //    }elseif($nome == '' or strlen($nome)<3){
     //       echo "escreva o teu nome corretamente";
     //   }elseif($email == '' or strlen($emaile)<10){
     //       echo "escreva o teu email corretamente";
    //    }elseif($senha == '' or strlen($senha)<3){
     //   }
    
    header("Location: ../login.php");
    //$sql_code =  "SELECT * FROM usuario WHERE email ='$email' AND senha ='$senha'";
}

?>