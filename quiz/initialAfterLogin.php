
<?php
  include "connection.php";

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
    <script src="/webjars/jquery/3.3.1/jquery.min.js"></script>
    <script src="/webjars/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body> 
<!--Barra de navegação-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="initialPage.php">
    <img src="images/Logo.png" width="60" height="60" alt="">
  </a>
  <a class="navbar-brand" href="initialPage.php">QuizQuiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="initialPage.php">Ínicio</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Os nossos quizzes <span class="sr-only">(current)</span> </a>
      </li>
    </ul>

    <!--Campo Pesquisar-->
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Procure aqui" aria-label="Search" id="pesquisa" value="<?php if(!empty($search)) { echo $search; }?>">
      <button type="submit" class="btn btn-link">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>

  <div>
      <a class="nav-link" style="color:grey;" href="user.php"> Conta</a>
  </div>

  <div>
      <a class="nav-link" style="color:red;" href="logout.php">Logout</a>
  </div>
</nav>

<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">

                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                            <ul class="breadcome-menu">
                                <li><div id="countdowntimer" style="display: block;"></div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
  setInterval(function(){
  timer();
  },1000);
  function timer()
  {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText=="00:00:01")
          {
              window.location="result.php";
          }

          document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

      }
  };
  xmlhttp.open("GET","forajax/load_timer.php",true);
  xmlhttp.send(null);
}

</script>

<?php
  include "footer.html";
?>