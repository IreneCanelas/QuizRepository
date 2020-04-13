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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="images/Logo.png" width="60" height="60" alt="">
  </a>
  <a class="navbar-brand" href="#">QuizQuiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Ínicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Os nossos quizzes</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Procure aqui" aria-label="Search">
    <!-- Login -->
    <button class="btn btn-info my-2 my-sm-0" type="submit" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>
      <div id="login" class="modal">
          <form class="modal-content" action="/action_page.php" method="POST">
            <div class="modal-header">
              <button type="button" onclick="document.getElementById('login').style.display='none'" class="close">&times;</button>
            </div>
            <div class="container">
              <h1>Login</h1>
              <hr>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Inserir Email" name="email" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Inserir Password" name="psw" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Recordar as minhas informações
              </label>

              <div class="clearfix">
                <!--Botão Cancelar -->
                <button value="Hover" type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancelar</button>
                <!--Botão Login -->
                <button type="submit" class="btn-info" id="Menubuttons">Login</button>
              </div>
            </div>
          </form>
        </div>
      <!-- Registo -->
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="document.getElementById('registo').style.display='block'" style="width:auto;">Registo</button> 
      <div id="registo" class="modal">
          <form class="modal-content" action="/action_page.php">
            <div class="modal-header">
              <button type="button" onclick="document.getElementById('registo').style.display='none'" class="close">&times;</button>
            </div>
            
            <div class="container">
              <h1>Registo</h1>
              <p>Por favor, preencha este formulário para criar uma conta.</p>
              <hr>
              <label for="name"><b>Nome</b></label>
              <input type="text" placeholder="Inserir Nome" name="name" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Inserir Email" name="email" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Inserir Password" name="psw" required>

              <label for="psw-repeat"><b>Repetir Password</b></label>
              <input type="password" placeholder="Repetir Password" name="psw-repeat" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Recordar as minhas informações
              </label>

              <p>Ao criar a conta você concorda com a nossa <a href="#" style="color:dodgerblue">Política de privacidade</a>.</p>

              <div class="clearfix">
                <!--Botão Cancelar -->
                <button value="Hover" type="button" onclick="document.getElementById('registo').style.display='none'" class="cancelbtn">Cancelar</button>
                <!--Botão Registar -->
                <button type="submit" class="btn-info" id="Menubuttons">Registar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</nav>

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



<!-- Footer -->
<footer>
  <div class="row justify-content-center"> 
      <div class="col-md-5 text-center"> 
          <img src="images/LOGO.png">
          <p> Se tiver alguma dúvida ou sugestão, entre em contacto connosco para que o possamos ajudar com a maior brevidade. </p>
          <strong> Informação de Contactos: </strong>
          <p> (+351) 111 222 333 <br> <a href="mailto:email@mailsquizz.pt?Subject=MailsQuiz Website"> email@quizwebsite.pt </a></p>
          <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-square"></i></a>
          <a href="https://twitter.com/" target="_blank"> <i class="fab fa-twitter-square"></i></a>
          <a href="https://www.instagram.com/" target="_blank"> <i class="fab fa-instagram"></i></a>
      </div>
      <hr class="footerHr"></hr>
      2020 &copy;QuizQuiz
  </div>
</footer>

</body>
</html>