<?php
  //session_start();
  include "connection.php";
  //include "set_category_type_session.php";
?>


<!-- Categoria dos Quizzes -->
<?php
if (!empty($quizzes) ) { ?>
<div class="center">
  <div class="offset"> 
    <div class="row text-center">
      <?php
      foreach($quizzes as $quiz) { ?>
          <div class="col-md-4">
              <div class="details_quiz">
                  <h3> <?php echo $quiz['name'] ?> </h3>
                  <img src="<?php echo $quiz['photo_url'] ?>" id="details_photo">
                  <!--onclick abrir questões-->
                  <a href="examOK.php?category=<?php echo $quiz['name'] ?>"> <button class="btn btn-outline-dark" type="submit" >Fazer este!</button> </a>
              </div>
          </div>
          <?php
      }?>
    </div>
  </div>
</div>
<?php } else {
     echo('Sem resultados.');
} ?>
<!-- Quando introduzem alguma pesquisa, volta a mostrar todos os quizzes -->
<div class="text-center mb-3"> 
  <form action="#pesquisa" name="search" method="GET">
    <button class="btn btn-outline-dark" type="submit">Voltar ao início.</button>
  </form>
</div>