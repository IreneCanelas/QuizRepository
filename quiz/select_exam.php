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
                  <!--onclick abrir questões-->
                  <button class="btn btn-outline-dark" type="submit" onclick="set_category_type_session(this.value);">Fazer este!</button>
              </div>
          </div>
          <?php
      }?>
    </div>
  </div>
</div>


<script type="text/javascript">
  function set_category_type_session(category) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        window.location = "dashboard.php";
      }
    };
    xmlhttp.open("GET","set_category_type_session.php?category="+category, true);
    xmlhttp.send(null);
  }
</script>