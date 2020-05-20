<?php
include "connection.php";
include "registo.php";
include "login.php";

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
?>

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
<!--Barra de navegação-->
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
        <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Os nossos quizzes</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Procure aqui" aria-label="Search" id="pesquisa" value="<?php if(!empty($search)) { echo $search; }?>">
    <!-- Login -->
    <button class="btn btn-info my-2 my-sm-0" type="submit" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>
      <div id="login" class="modal">
          <form class="modal-content" action="" method="POST">
            <div class="modal-header">
              <button type="button" onclick="document.getElementById('login').style.display='none'" class="close">&times;</button>
            </div>
            <div class="container">
              <h1>Login</h1>
              <hr>

              <label for="emaill"><b>Email</b></label>
              <input type="text" placeholder="Inserir Email" name="emailL" required>

              <label for="pswL"><b>Password</b></label>
              <input type="password" placeholder="Inserir Password" name="pswL" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember">Recordar as minhas informações
              </label>

              <?php 
                if(!empty($_GET['error']) && $_GET['error'] == 1) { 
                    echo '<p style="color:red"> Nome de Utilizador ou Palavra-passe errada! </p>'; 
              } ?>

              <div class="clearfix">
                <!--Botão Cancelar -->
                <button value="Hover" type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancelar</button>
                <!--Botão Login -->
                <button type="submit" name="submit" class="btn-info" id="Menubuttons">Login</button>
              </div>
            </div>
          </form>
        </div>


      <!-- Registo -->
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="document.getElementById('registo').style.display='block'" style="width:auto;">Registo</button> 
      <div id="registo" class="modal">

          <!--Início do Formulário-->
          <form class="modal-content" action="<?php echo $_SERVER['PHP_SELF']?>" method='POST' onSubmit="return checkform()">
            <div class="modal-header">
              <button type="button" onclick="document.getElementById('registo').style.display='none'" class="close">&times;</button>
            </div>
            
            <div class="container">
              <h1>Registo</h1>
              <p>Por favor, preencha este formulário para criar uma conta.</p>
              <hr>

              <!--Nome-->
              <label for="name"><b>Nome</b></label>
              <input type="text" placeholder="Inserir Nome" value="<?php echo htmlspecialchars($name) ?>" name="name" required>
              <div class="erro"><?php echo $errors['name']; ?></div>

              <!--Email-->
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Inserir Email" value="<?php echo htmlspecialchars($email) ?>" name="email" required>
              <div class="erro"><?php echo $errors['email']; ?></div>

              <!--Password-->
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Inserir Password" value="<?php echo htmlspecialchars($psw) ?>" name="psw" required>
              <div class="erro"><?php echo $errors['psw']; ?></div>

              <!--Confirmação Password-->
              <label for="psw_repeat"><b>Repetir Password</b></label>
              <input type="password" placeholder="Repetir Password" value="<?php echo htmlspecialchars($psw_repeat) ?>" name="psw_repeat" required>
              <div class="erro"><?php echo $errors['psw_repeat']; ?></div>
              
              <label>
                <input type="checkbox" checked="checked" name="remember">Recordar as minhas informações
              </label>

              <p>Ao criar a conta você concorda com a nossa <a href="#" style="color:dodgerblue">Política de privacidade</a>.</p>

              <div class="clearfix">
                <!--Botão Cancelar Registo -->
                <button value="Hover" type="button" onclick="document.getElementById('registo').style.display='none'" class="cancelbtn">Cancelar</button>

                <!--Botão Confirmar Registo -->
                <button type="submit" name="submit" class="btn-info" id="Menubuttons">Registar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</nav>




