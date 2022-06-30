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
    <style type="text/css">
       img#profile{
            width: 100px;
            height: 100px;
            display: block;
            margin: auto;
            margin-top: 30px;
            border: 3px solid #1E90FF;
            background-color: #1E90FF;
            border-radius: 10px;
            margin-bottom: -30px;
          
        }
        div#menu{
                width: 400px;
                height: 70px;
                display: block;
                margin: auto;
                border: none;
                border-radius: 5px;
                background: #1E90FF;
            }
            
        h2{
            text-align: center;
            padding-top: 40px;
            background-color: 1E90FF;
            margin-bottom: 50px;
            margin-top: 1px;
            margin-left: 800px;
            margin-right: 800px;
          }
          h3{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 12x;
                margin-left: 710px;
                color: red;
                padding-top: 25;
            }
            div.pub{
                width: 400px;
                min-height: 70px;
                max-height: 1000px;
                display: block;
                margin: auto;
                border: none;
                border-radius: 5px;
                background-color: #FFF;
                box-shadow: 0 0 6px #A1A1A1;
                margin-top: 30px;
            }
            div.pub a{
                color: #666;
                text-decoration: none;
            }
            div.pub a:hover{
                color: #111;
                text-decoration: none;
            }
            div.pub p {
                margin-left: 10px;
                contain: #666;
                padding-top: 10px;
            }
            div.pub span {
                display: block;
                margin: auto;
                width: 380px;
                margin-top: 10px;
            }
            div.pub img{
                display: block;
                margin: auto;
                width: 100%;
                margin-top: 10px;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
          
          
          
    </style>
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
            </div>';
          }else{
            echo '<div class="pub" id="'.$id.'" ">
            <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> -'.$pub["data"].' </p>
            <span>'.$pub['texto'].'</span>
            <img src="upload/'.$pub["imagem"].'">
            </div>';
           
          }
       }
    ?>
</body>
</html>