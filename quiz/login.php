<?php

include "connection.php";

if(!empty($_POST["emailL"]) && !empty($_POST["pswL"])) {
  $result = mysqli_query($conn,"SELECT id, email, psw FROM registos WHERE email='" . $_POST["emailL"] . "' and psw = '". $_POST["pswL"]."'");
  $count  = mysqli_num_rows($result);

  //---------------------------------------------
  //Buscar o conjunto de registos desta linha
  $row=mysqli_fetch_assoc($result);
  //Extrair a variável ID desta linha
  $userid=$row['id'];
  //Inserir na variável session userid
  $_SESSION['userid'] = $userid;
  //---------------------------------------------

  if($count==0) {
      header('Location: initialPage.php?error=1');
  } else {
    header('Location: initialAfterLogin.php');
  }
}

?>







<?php /* if(!empty($_GET['error']) && $_GET['error'] == 1) { ?>
  <script>
      $('#loginModal').modal('show');
  </script>
<?php } */?>


