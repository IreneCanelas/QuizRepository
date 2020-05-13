<?php

include "connection.php";

if(!empty($_POST)) {
    $result = mysqli_query($conn,"SELECT email, psw FROM registos WHERE email='" . $_POST["email"] . "' and psw = '". $_POST["psw"]."'");
    $count  = mysqli_num_rows($result);
    if($count==0) {
        header('Location: initialPage.php?error=1');
    } else {
        header('Location: initialAfterLogin.php');
    }
  }
?>

  <?php if(!empty($_GET['error']) && $_GET['error'] == 1) { ?>
    <script>
        $('#loginModal').modal('show');
    </script>
<?php } ?>