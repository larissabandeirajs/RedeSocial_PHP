<?php
include("header.php");
session_start();
//echo var_dump($_SESSION);

   //$pubs = $mysqli->query ("SELECT * FROM pubs WHERE idUsuario='". ] . "' ORDER BY id DESC");
   $pubs = $mysqli->query ("SELECT * FROM pubs ORDER BY id desc");

if(isset($_POST['publish'])){
    $idUsuario = $_SESSION["usuario"];
    $texto = $_POST['texto'];
    $imagem = $_FILES['file'];
    
    if( $_FILES['file']['error'] > 0){
        $texto =$_POST['texto'];
         
       // $imagem = $_FILES["imagem"];
        $hoje = date("Y-m-d");

            if($texto == ""){
                echo "<h3>Tens de escreve alguma coisa antes de publicar</h3>";
            }else{                
                $mysqli->query ("INSERT INTO pubs (idUsuario, texto, imagem, data) VALUES ('{$idUsuario}', '{$texto}', '{$imagem}', '{$hoje}')");
                $data = $mysqli->query or die();
                    if($data){
                        header("Location: ./");
                    }else{
                        echo "Alguma coisa não ocorreu bem...Tente novamente";
                    }
            }
     }else{
        $n = rand(0,1000000);
        $imagem = $n.$_FILES["file"]["name"];

        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$imagem);

        $texto = $_POST['texto'];
        $hoje = date("Y-m-d");
                    
        if($texto == ""){
            echo "<h3><br>Tens de escreve alguma coisa antes de publicar</h3>";
        }else{
            $mysqli->query ("INSERT INTO pubs (idUsuario, texto, imagem, data) VALUES ('{$idUsuario}', '{$texto}', '{$imagem}', '{$hoje}')");
          // $data = $mysqli->query or die();
         ///       if($data){
              //     header("Location: ./");
           //   }else{
                //    echo "Alguma coisa não ocorreu bem...Tente novamente";
              //  }
           
        }
    }
}
?>
<html>
    <header>
    <style type="text/css">
          h3{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 12x;
                margin-left: 710px;
                color: red;
                padding-top: 25;
            }
        div#publish{

            width: 400px;
            height: 180px;
            display: block;
            margin: auto;
            border: none;
            border-radius: 5px;
            background: #FFF;
            box-shadow: 0 0 6px #A1A1A1;
            margin-top: 30px;
        }
        div#publish textarea {
            resize: none;
            width: 365px;
            height: 100px;
            display: block;
            margin: auto;
            border-radius: 5px;
            padding-left: 5px;
            padding-top: 5px;
            border-width: 1px;
            border-color: #A1A1A1;
        }
        div#publish img{
            margin-top: 5px;
            margin-left: 20px;
            width: 25px;
            cursor: pointer;
        }
        div#publish input[type="submit"] {
                width: 70px;
                height: 25px;
                border-radius: 3px;
                float: right;
                margin-right: 15px;
                border: none;
                margin-top: 20px;
                background: #4169E1;
                color: #FFF;
                cursor: pointer;
            }
            div#publish input[type="submit"]:hover {
                background: #002f3f;
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
    <div id="publish">
    <form method="POST" enctype="multipart/form-data">
        <br>
        <textarea placeholder="Escreva uma publicação nova" name="texto"></textarea>
        <label for="file-input">
        <img src="imagem/camera.png" title="Inserir uma foto">
        </label>
        <input type="submit" value="Publicar" name="publish">

        <input type="file" id="file-input" name="file" hidden>

    </form>
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
            <p><a href="#">'.$nome.'</a> -'.$pub["data"].' </p>
            <span>'.$pub['texto'].'</span><br>
            </div>';
          }else{
            echo '<div class="pub" id="'.$id.'" ">
            <p><a href="#">'.$nome.'</a> -'.$pub["data"].' </p>
            <span>'.$pub['texto'].'</span>
            <img src="upload/'.$pub["imagem"].'">
            </div>';
           
          }
       }
    ?>
</body>
</html>