<?php
include("db.php");
session_start();
echo $_SESSION["usuario"];

      if(isset($_FILES['arquivo'])) {
      $arquivo = $_FILES['arquivo'];
      
      if($arquivo['error'])
         die("Falha ao enviar arquivo");

      if($arquivo['size'] > 2097152)
           die("arquivo muito grande! max 2MB");
      

      $pasta = "arquivos/";
      $nomeDoArquivo = $arquivo['name'];
      $novoNomeNOmeDoArquivo = uniqid();
      //$extensao = pathinfo($target_file, PATHINFO_EXTENSION);
      $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

         if($extensao != 'jpg' && $extensao != 'png'){
               die("Tipo de arquivo não aceito");
         }
       $deu_Certo =  move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeNOmeDoArquivo . "." . $extensao);
            if($deu_Certo)
             echo "<p>Arquivo enviado com sucesso! Para acessa-lo, clique aqui: <a href=\"arquivos/$nomeDoArquivo.$extensao\"> Clique aqui</a></p>";    
   }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Update de arquivos- Social Friends</title>
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
         p{
            text-align: center;
            font-size: 25px;
            color: red;
            margin-top: 15px;
         }
    </style>

</head>
<body>
         <h1>Bem Vindo(a)</h1>
         <h2>Carregar Imagem</h2>

         <form action="" method="POST">
            <label>Nome:</label>
            <input type="text" name="arquivo" placeholder="Digitar o nome"><br><br>
            <label>Imagem</label>
            <input type="file" name="imagem"><br><br>
            
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
        
</body>
</html>