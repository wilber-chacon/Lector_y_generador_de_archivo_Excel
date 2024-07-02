<?php


$mysqli = new mysqli('localhost','root','','BD_Villa_Despensa');

if($mysqli->connect_errno)
{
  echo 'fallo la conexion' . $mysqli->connect_error;
  die();
}



$sevidor = "localhost";
$usuario = "root";
$pass = "";
$bd = "BD_Villa_Despensa";

$conexion = mysqli_connect($sevidor, $usuario, $pass, $bd);
?>