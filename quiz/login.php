<?php 
include "connection.php";

$email = $_POST['email'];
$password = md5($_POST['psw']);
$login = $_POST['login'];
$connect = mysql_connect('localhost','email','psw');
$db = mysql_select_db('registos');
  if (isset($entrar)) {
           
    $verifica = mysql_query("SELECT * FROM registos WHERE login = 
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("login",$login);
        header("Location:index.php");
      }
  }
?>