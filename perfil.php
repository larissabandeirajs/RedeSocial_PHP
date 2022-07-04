<?php
include("header.php");
session_start();
//echo var_dump($_SESSION);

   //$pubs = $mysqli->query ("SELECT * FROM pubs WHERE idUsuario='". ] . "' ORDER BY id DESC");

   $id = $_GET["id"];
   $idUsuario = $_SESSION["usuario"];
   $saberr = $mysqli->query("SELECT * FROM usuario where id='{$id}'");
   $saber = mysqli_fetch_assoc($saberr);
   $email =$saber["email"];

    if($email == $idUsuario ){
            header("myperfil.php");
    }

   $pubs = $mysqli->query ("SELECT * FROM pubs ORDER BY id desc");


?>
<html>
    <header>
        <title>Perfil</title>
        <link rel="stylesheet" type="text/css" href="./css/perfil.css"/>
        <link rel="icon" type="imagem/png" href="imagem/SocialFriends_1.ico" />
    </header>
<body>
 <?php
        if($saber["img"]==""){
            echo '<img src="imagem/user.png" id="profile"';
        }else{
            echo '<img src="upload/'.$saber['img'].'" id="profile"';
        }
 ?>
   <div id="menu">
   <h2 ><?php echo $saber['nome']." ".$saber['apelido'];  ?></h2>
   </div>
    <?php
    while($pub=mysqli_fetch_assoc($pubs)) {
        
          $idUsuario = $pub['idUsuario'];
          $imagem = $pub['imagem'];
          $saberr = $mysqli->query("SELECT * FROM usuario WHERE id={$idUsuario};");
     
       // echo var_dump($saberr) . "<br>";
     //   $saber = $saberr->fetch_assoc();
      //  echo var_dump($saber) . "<br>";
          $saber = $saberr->fetch_assoc();
          $nome = $saber['nome']." ".$saber['apelido'];
          $id = $pub['id'];

          if($pub['imagem'] == ""){
            echo '<div class="pub" id="'.$id.'" ">
            <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> -'.$pub["data"].' </p>
            <span>'.$pub['texto'].'</span><br>
            <button type="button" onclick="like_txt()" id="contartxt">Curtir</button>
            </div>';
          }else{
            echo '<div class="pub" id="'.$id.'" ">
            <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> -'.$pub["data"].' </p>
            <span>'.$pub['texto'].'</span>
            <img src="upload/'.$pub["imagem"].'">
            <button type="button" onclick="like()" id="contar">Curtir</button>
            </div>';
           
          }
       }
    ?>
      <script type="text/javascript" src="javascript/perfil.js"></script>
</body>
</html>