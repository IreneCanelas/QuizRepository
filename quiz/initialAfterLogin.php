
<?php
session_start();

  include "connection.php";
  include "headerAfterLogin.php";
  include "select_exam.php";

  // Botao de Pesquisa na nav 
  echo "<script>alert( 'O seu login foi bem sucedido, seja bem vindo!' );</script>"; 
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

  if ( isset($_GET['search'])) {
    echo "<div class='text-center mb-3'> ";
      echo "<form action='#pesquisa' name='search' method='GET'>";
        echo " <button class='btn btn-outline-dark' type='submit'>Voltar ao início.</button> " ;
      echo" </form>";
    echo "</div>";
  }

 
  include "footer.html";

?>