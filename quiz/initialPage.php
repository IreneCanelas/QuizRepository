<?php
include "connection.php";
?>

<?php

  //Join to table
  $sql = "SELECT id, name, photo_url FROM quizzes";

  $result = $conn->query($sql);
  $quizzes = [];

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $quizzes[] = $row;
      }
  } else {
      echo "0 results";
  }


  include "header.php";
?>


<!-- Quizzes -->
<div class="center">
  <div class="offset"> 
    <div class="row text-center">
      <?php
      foreach($quizzes as $quiz) { ?>
          <div class="col-md-4">
              <div class="details_quiz">
                  <h3> <?php echo $quiz['name'] ?> </h3>
                  <img src="<?php echo $quiz['photo_url'] ?>" id="details_photo">
                  <button class="btn btn-outline-dark" type="submit"> Fazer este! </button>
              </div>
          </div>
          <?php
      }?>
    </div>
  </div>
</div>
<!-- Fim Quizzes -->

<?php 
  include "footer.html";
?>
