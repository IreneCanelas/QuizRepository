<?php

session_start();
include "connection.php";

if(!empty($_POST)) {
  $result = mysqli_query($conn,"SELECT id, email, psw FROM registos WHERE email='" . $_POST["emailL"] . "' and psw = '". $_POST["pswL"]."'");

  $count  = mysqli_num_rows($result);
  $user = $result->fetch_assoc();
  //$users = [];
  if($count==0) {
      header('Location: index.php?error=1');
  } else {
     $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
    header("Location: initialAfterLogin.php");
  }
}
?>
