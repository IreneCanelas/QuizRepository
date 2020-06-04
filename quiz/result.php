<?php
session_start();
include "connection.php";
if (isset($_SESSION['user_id'])) {
  include "headerAfterLogin.php";
}
else { include "header2.php"; }



?>



<!-- Coluna -->
<div class="col-lg-4 col-md-12 mx-auto mt-3">

<!--Card Narrower-->
<div class="card card-cascade narrower">

  <!--Imagem-->
  <div class="view view-cascade overlay">
    <img src="images/fundo.jpg" class="card-img-top"
      alt="imagem final">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
  <!--Fim da imagem-->

  <!--Conteúdo-->
  <div class="card-body card-body-cascade">
    <form action="quizzes.php">
    <!--Título-->
    <h4 class="text-warning text-center"><i class="fas fa-poll"></i> Resultado</h4><br>
    <!--Subtítulo
    <h5 class="card-title">Veja aqui seu desempenho:</h4>-->
    <!--Texto-->
    <form action="examOK.php">
      
    <!--Resultado-->
      <!--Número de respostas corretas-->
      <?php $no = @$_SESSION['score'] ?>
      <p class="card-text "><span>Respostas corretas:&nbsp;<?php echo $no . " em ". $_SESSION['numberOfQuestions'];
      unset($_SESSION["score"]); ?></span><br>
      <!--Se categoria Biologia, como tem menos perguntas, para obter pontuação faz-se x4 -->
      <?php if ($_SESSION['category'] == 'Biologia') {
        $_SESSION["scorefinal"] = $no*4;?>
        <span>Pontuação final:&nbsp<?php echo $_SESSION["scorefinal"] . " em 20"; ?></span> <br>
      <?php } else { 
        $_SESSION["scorefinal"] = $no*2;?>
        <span>Pontuação final:&nbsp<?php echo $_SESSION["scorefinal"]. " em 20";?></span>
       
      <?php } ?>

      <?php  
       //Variável Data do final da realização do quiz
        $finalTime = date('H:i:s');
        
        //$dif = "SELECT DATEDIFF(seconds, 'initialDate', 'finalDate') AS DateDiff";
        //$datetime1 = new Datetime($_SESSION['initialTime']);
        $datetime2 = new Datetime($finalTime);
        $interval = $_SESSION['initialTime']->diff($datetime2);
        $dif = $interval->format('%H:%I:%S');
  
        //$date2 = $_SESSION['initialTime']->diff($finalTime);
        //$diff = date_diff(strtotime($finalTime), strtotime($_SESSION['initialTime']));
        //$diff =  dateDiff($finalTime, $_SESSION['initialTime']) . "\n";
        
        //$diff = (strtotime($finalTime) - strtotime($_SESSION['initialTime']));
        //echo $date2->i; die;
        
      ?>
      
      <p class="card-text "><span>Tempo: &nbsp;<?php echo $dif; ?><br>
      <!-- Se foi aprovado ou reprovado -->
      <?php 
        if ($no > $_SESSION['numberOfQuestions']/2 ) {?>
        <span style="color:green"> Foi aprovado! </span>
      <?php } else { ?>
        <span style="color:red">Foi reprovado! </span> 
      <?php } ?>

     
      <?php
       //-------------------------------------------------------------------
      //Inserir os campos na tabela result
      if (isset($_SESSION['user_id'])) {
        $useridfinal = $_SESSION['user_id'];
        //var_dump($useridfinal);
        $quiz_category = $_SESSION['category'];
        //var_dump($quiz_category);
        $num_questions = $_SESSION['numberOfQuestions'];
        $score = $_SESSION['scorefinal'];
        //var_dump($score);
        //Se quisermos adicionar a data e hora do quiz
        $scoreDate = date('Y-m-d H:i:s');
        //var_dump($scoreDate);
        $qryfim = "INSERT INTO `result`(`user_id`, `category_id`, `score`, `num_questions`, `score_date`, `finalDate`, `time`) VALUES ('$useridfinal','$quiz_category', '$score', '$num_questions', '$scoreDate','$finalTime', '$dif')";
        $result = $conn->query($qryfim); 
      }?>
      <!------------------------------------------------------------------->
    </form>



<!-- VER: se é preciso dar unset a estes sessions -->
      <script type="text/javascript">
          function radioValidation(){
              /* var useransj = document.getElementById('rd').value;
              //document.cookie = "username = " + userans;
              alert(useransj); */
              var uans = document.getElementsByName('userans');
              var tok;
              for(var i = 0; i < uans.length; i++){
                  if(uans[i].checked){
                      tok = uans[i].value;
                      alert(tok);
                  }
              }
          }
      </script>
      <br>
      <!--BOTOES REDES SOCIAIS-->
      <div class="text-center">
        <p>Compartilhe o resultado com os seus amigos!</p>
        <!--Facebook-->
        <a href= "https://www.facebook.com/sharer.php?u=http%3A%2F%2Fcss-tricks.com%2F" target="_blank" class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
        <!--Twitter-->
        <a href = "http://twitter.com/share?text=O%20meu%20resultado%20no%20quiz%20foi:&%20url=http://localhost/QuizRepository/quiz/result.php?click=" target="_blank" class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
        <!--WhatsApp-->
        <a href = "whatsapp://send?text=http://localhost/QuizRepository/quiz/result.php?click=" target="_blank" class="whatsapp-ic" role="button"><i class="fab fa-lg fa-whatsapp"></i></a>
      </div>

  </div>
  <!--/.Card content-->

</div>
<!--/.Card Narrower-->

</div>
<!-- Grid column -->


<?php
    include "footer.html";
?>