<?php

include "connection.php";

if(!empty($_POST["emailL"]) && !empty($_POST["pswL"])) {
  $result = mysqli_query($conn,"SELECT email, psw FROM registos WHERE email='" . $_POST["emailL"] . "' and psw = '". $_POST["pswL"]."'");
  $count  = mysqli_num_rows($result);
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