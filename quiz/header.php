<?php
include "connection.php";
include "registo.php";
include "login.php";


  // Botao de Pesquisa na nav 
  //$_SESSION['search'] = $_GET['search']; 
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
  } //else {
    //  echo "0 results";   
  //}
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
    <script src='style/TimeCircles.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body> 
<!--Barra de navegação-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="images/Logo.png" width="60" height="60" alt="">
  </a>
  <a class="navbar-brand" href="#">QuizQuiz</a>

  <!--Hamburguer Menu-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!--Hamburguer Menu-->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Os nossos quizzes</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0"></div>

    <form class="form-inline" action="" method="GET">
      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Procure aqui..." value="<?php if(!empty($search)) { echo $search; }?>">
      <!-- <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Submeter</button> -->
    </form>
    
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
      <button class="btn btn-outline-info my-2 my-sm-0" onclick="document.getElementById('registo').style.display='block'" style="width:auto;">Registo</button> 

      <!--Início do Formulário-->
      <div id="registo" class="modal">
        <div role="document">
          <div class="modal-content">


        <!--MODAL HEADER-->
            <div class="modal-header">
              <!--Titulo-->
              <h2 class="modal-title text-center" id="exampleModalLabel">Registo</h2><br>
              <hr>
              <!--Botão "x"-->
              <button type="button" onclick="document.getElementById('registo').style.display='none'" class="close">&times;</button>
            </div>
        <!--FIM DO MODAL HEADER-->

        <!--MODAL BODY-->
              <div class="modal-body">
                <form class="needs-validation" novalidate method='POST'>

                  <!--Nome-->
                  <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome</b></label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Inserir Nome" required value="<?php echo $name; ?>">
                      <div class="invalid-feedback">
                      É obrigatório inserir um nome. 
                      </div>
                  </div>

                  <!--Email-->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required value="<?php echo $email; ?>">
                      <div class="invalid-feedback">
                        Please enter a valid email address
                      </div>
                    <small id="emailHelp" class="form-text text-muted">Nunca iremos compartilhar suas informações.</small>
                  </div>

                  <!--Password-->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="psw" placeholder="Password" required>
                      <div class="invalid-feedback">
                        Please enter a password
                      </div>
                  </div>

                  <!--Confirmação Password
                  <label for="exampleInputPassword2">Confirmar Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="psw_repeat" placeholder="Password" required>
                    <div class="invalid-feedback">
                      Please enter a password
                    </div>-->
                  
                    <div class="form-check mb-1">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Recordar as minhas informações</label>
                    </div>

                  <p>Ao criar a conta você concorda com a nossa <a href="#" style="color:dodgerblue">Política de privacidade</a>.</p>

                    <div class="clearfix">
                    <!--Botão Cancelar Registo -->
                    <button value="Hover" type="button" onclick="document.getElementById('registo').style.display='none'" class="cancelbtn">Cancelar</button>

                    <!--Botão Confirmar Registo -->
                    <button type="submit" name="reg_user" class="btn-info" id="Menubuttons">Registar</button>
                    </div>
                </form>
              </div> 
          </div>
        </div>
      </div>
</nav>

<script>
  //Vai desabilitar o submit caso tenha algum campo inválido
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      //Busca todos os formulários que precisam de validação e aplica de forma personalizada a cada um.  
      var forms = document.getElementsByClassName('needs-validation');
      //Impede o envio 
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

</script>

