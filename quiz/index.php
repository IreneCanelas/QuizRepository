<?php
  include "connection.php";
  include "header.php";
  //echo $_SESSION['user_id'];
  include "select_exam.php";


  if ( isset($_GET['search'])) {
    echo "<div class='text-center mb-3'> ";
  echo "<form action='#pesquisa' name='search' method='GET'>";
  echo " <button class='btn btn-outline-dark' type='submit'>Voltar ao início.</button> " ;
 echo" </form>";
echo "</div>";
  }

  include "footer.html";
 
?>
