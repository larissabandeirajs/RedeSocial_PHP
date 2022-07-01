<?php
    include("db.php");

  
//echo var_dump($_SESSION);
      //$login_cookie = $_COOKIE['login'];
        //if(isset($login_cookie)){
          //  header("Location: login.php");
        
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet" type="text/css">
    <title>Page Title</title>
    <style>
        *{
            font-family: 'Montserrat', cursive;
            margin: 0;
        }
        body{
          /*  background: #f6f6f6;*/
          background:#F8F8F8;   
        }
        div#topo {
            width: 100%;
            top: 0;
            background: #fff;
            box-shadow: 0 0 5px #000;
            height: 110px;
            background:#ACD2D7;
        }
        div#topo img[name="SocialFriends_1"] {
            float: left;
            margin-left: 20px;
            margin-top: -10px;;
        }
        div#topo img[name="menu"] {
            float: right;
            margin-right: 35px;
            margin-top: -22px;
        }
        div#topo input[type="text"] {
             display: block;
             margin: auto;
             width: 300px;
             border: none;
             border-radius: 3px;
             background: #f6f6f6;
             height: 30px;
             padding-left: 10px;
             box-shadow: inset 0 0 3px #666;
             margin-top: 20px;
        }
        div#topo form{ 
            width: 300px;
            display: block;
            margin: auto;
            padding-top: 22px;
        }
    </style>
    
     
</head>
<body>
    <div id="topo">
       <a href="pub.php"><img src="imagem/SocialFriends_1.png" width="100" name="SocialFriends_1"></a>
        <form method="GET">
        <input type="text" placeholder="Pesquisar" name="query" autocomplete="off"><input type="submit" hidden>
        </form>
        <a href="#"><img src="imagem/chat.png" width="30" name="menu"></a>
        <a href="perfil.php?id=18"><img src="imagem/perfil.png" width="30" name="menu"></a>
    </div>
</body>
</html>