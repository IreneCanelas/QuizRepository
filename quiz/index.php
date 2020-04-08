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

    <button class="btn btn-primary btn-lg" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Registar</button> 
  
      <div id="id01" class="modal">
        <!--Botão X para fechar registo -->
        <!--<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>-->
          <form class="modal-content" action="/action_page.php">
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
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Recordar minhas informações
              </label>

              <p>Ao criar a conta você concorda com a nossa <a href="#" style="color:dodgerblue">Política de privacidade</a>.</p>

              <div class="clearfix">
                <!--Botão Cancelar -->
                <button value="Hover" onmouseout="this.style.backgroundColor='#128568'; this.style.borderColor='#26a773'"       onmouseover="this.style.backgroundColor='#f44336';this.style.borderColor='#ff4d3e'" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            
                <!--Botão Registar -->
                <button type="submit" class="signupbtn">Registar</button>
              </div>
            </div>
          </form>
      </div>

    
      
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
      2020 &copy;QuizQuiz
  </div>
</footer>

</body>
</html>