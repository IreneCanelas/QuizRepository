<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> QuizQuiz Website </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body> 

<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "quizwebsite";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

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

<div id="menu">
  <a class="logo" href="index.php"><img src="images/Logo.png"></a>
</div>
  <div id="Menubuttons">
    <button type="button" class="btn btn-primary btn-lg"> Registar </button>
    <button type="button" class="btn btn-primary btn-lg"> Login </button>
  </div>

<!-- Quizz -->
<div class="offset"> 
  <div class="row text-center">
    <?php
    foreach($quizzes as $quiz) { ?>
        <div class="col-md-3">
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
<!-- Fim Quizz -->



<!-- Footer -->
<footer>
  <div class="row justify-content-center"> 
      <div class="col-md-5 text-center"> 
          <img src="images/LOGO.png">
          <p> Se tiver alguma dúvida ou sugestão, entre em contacto connosco para que o possamos ajudar com a maior brevidade. </p>
          <strong> Informação de Contactos: </strong>
          <p> (+351) 111 222 333 <br> <a href="mailto:email@mailsquizz.pt?Subject=MailsQuiz Website"> email@mailsquizz.pt </a></p>
          <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-square"></i></a>
          <a href="https://twitter.com/" target="_blank"> <i class="fab fa-twitter-square"></i></a>
          <a href="https://www.instagram.com/" target="_blank"> <i class="fab fa-instagram"></i></a>
      </div>
      <hr class="baixo"></hr>
      2019 &copy; Adota-me
  </div>
</footer>

</body>
</html>