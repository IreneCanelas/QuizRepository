<?php 

include "connection.php";

 // dados de registo - nome, email, pass, repetir pass
 $name = "";
 $email = "";
 $password_1 = "";
 //$password_2 = "";

 //ligacao com o botão submit
 if(isset($_POST['reg_user'])){ 

  //variaveis recebem os valores inseridos no formulario 
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['psw']);
  //$password_2 = mysqli_real_escape_string($conn, $_POST['psw_repeat']);

  //query para inserir na base de dados
  $query = "INSERT INTO registos (name, email, psw) 
        VALUES('$name', '$email', '$password_1')";
  mysqli_query($conn, $query);
  $_SESSION['name'] = $name;
  $_SESSION['success'] = "You are now logged in";
  header('location: index.php');
  }

?>