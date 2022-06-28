<?php
   // mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
 //   $link = new link('localhost', 'root', 'usbw', 'redesocial');
  // $link = mysqli_connect("localhost", "root", "usbw") or die("Não foi possivvel acessar o servidor!");
   // $mysqli->select_db("redesocial") or die("Imporessivel entrar na Base de Dados...");

$hostname = "localhost";
$bancodedados = "redesocial";
$usuario = "root";
$senha = "usbw";
// Create connection
$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);
// Check connection
if ($mysqli->connect_errno) {
    die( "Falha ao conectar ao banco de dados" . $mysqli->error);
}
?>  
<html>
    <header>
        <meta charset="utf-8">
        <title>Social Friends</title>
    </header>
</html>
