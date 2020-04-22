<?php
    include "connection.php";
?>

<!-- Categoria dos Quizzes -->
<div class="center">
  <div class="offset"> 
    <div class="row text-center">
      <?php
      foreach($quizzes as $quiz) { ?>
          <div class="col-md-4">
              <div class="details_quiz">
                  <h3> <?php echo $quiz['name'] ?> </h3>
                  <img src="<?php echo $quiz['photo_url'] ?>" id="details_photo">
                  <!--Trocar o nome do onclick para o arquivo da Sara-->
                  <button class="btn btn-outline-dark" type="submit" onclick="document.location.href='index.php'">Fazer este!</button>
              </div>
          </div>
          <?php
      }?>
    </div>
  </div>
</div>

