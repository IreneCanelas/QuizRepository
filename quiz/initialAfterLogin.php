
<?php

session_start();
  include "connection.php";


  // Botao de Pesquisa na nav  
  if(!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT id, name, photo_url FROM quizzes WHERE name='" . $search . "'";
  } else {
      $sql = "SELECT id, name, photo_url FROM quizzes";
  }

  $result = $conn->query($sql);
  $quizzes = [];

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $quizzes[] = $row;
      }
  } else {
      echo "0 results";
}

include "headerAfterLogin.php"
?>


<!-- Ler user_id -->
<!-- <p>Email: <?php  var_dump(@$_SESSION['user_email']) ?> </p> -->
<!-- <p>ID: <?php  var_dump(@$_SESSION['user_id']) ?> </p> -->


<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">

                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                            <ul class="breadcome-menu">
                                <li><div id="countdowntimer" style="display: block;"></div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
  include "select_exam.php";
  include "footer.html";
?>

