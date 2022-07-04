<?php
include("header.php");
session_start();
//echo var_dump($_SESSION);

   //$pubs = $mysqli->query ("SELECT * FROM pubs WHERE idUsuario='". ] . "' ORDER BY id DESC");
   $pubs = $mysqli->query ("SELECT * FROM pubs ORDER BY id desc");

if(isset($_POST['publish'])){
    $idUsuario = $_SESSION["usuario"];
    $texto = $_POST['texto'];
    $imagem = $_FILES['file']["name"];
 
    if( $_FILES['file']['error'] > 0){
        $texto =$_POST['texto'];
         
       // $imagem = $_FILES["imagem"];
        $hoje = date("Y-m-d");

            if($texto == ""){
                echo "<h3>Tens de escreve alguma coisa antes de publicar</h3>";
            }else{                                   
             //   $mysqli->query ("INSERT INTO pubs (idUsuario, texto, imagem, data) VALUES ('{$idUsuario}', '{$texto}', '{$imagem}', '{$hoje}')");
                $result = $mysqli->query("INSERT INTO pubs (idUsuario, texto, imagem, data) VALUES ('{$idUsuario}', '{$texto}', '{$imagem}', '{$hoje}')");                
                if($result){
                    //header("Location: /RedeSocial_PHP/pub.php");
                }else{
                    echo "Alguma coisa não ocorreu bem...Tente novamente";
                    die();
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
    <link rel="stylesheet" type="text/css" href="./css/pub.css"/>
    <link rel="icon" type="imagem/png" href="imagem/SocialFriends_1.ico" />
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
           <!-- <div id="curtidas">
             <button type="button" onclick="like()" id="contar">curtir</button>
            </div>  -->
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
    <script type="text/javascript">
        let contador = 0;
       const like = () => {
           let curtidas = document.getElementById('contar');
           contador =  contador + 1
           curtidas.innerHTML = `<h2>Curtidas: ${contador} </h2>`;    
       }

       let cont = 0;
       const like_txt = () => {
           let curtidastxt = document.getElementById('contartxt');
           cont =  cont + 1
           curtidastxt.innerHTML = `<h2>Curtidas: ${cont} </h2>`;    
       }

    </script>
    <footer id="rodape">
        <h2> Rede Social: Social Friends </h2>
        <h2>Copyright &copy; 2022 - by Larissa Bandeira de Jesus</h2>
    </footer>
</body>
</html>