
<?php
session_start();

  include "connection.php";
  include "headerAfterLogin.php";
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