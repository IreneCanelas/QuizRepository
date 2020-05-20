<?php
include "connection.php";
include "header2.php";
session_start();
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
      <p class="card-text "><span>Respostas corretas:&nbsp;<?php echo $no . " em ". $_SESSION['numberOfQuestions'] ;
      unset($_SESSION["score"]); ?></span><br>
      <!--Se categoria Biologia, como tem menos perguntas, para obter pontuação faz-se x4 -->
      <?php if ($_SESSION['category'] == 'Biologia') {?>
        <span>Pontuação final:&nbsp<?php echo $no*4 . "em 20"; ?></span> <br>
      <?php } else { ?>
        <span>Pontuação final:&nbsp<?php echo $no*2 . " em 20"; $_SESSION["scorefinal"] = $no*2; ?></span> <br>
        
      <?php } ?>
      <!-- Se foi aprovado ou reprovado -->
      <?php if ($no > $_SESSION['numberOfQuestions']/2 ) {?>
        <span style="color:green"> Foi aprovado! </span>
      <?php } else { ?>
        <span style="color:red">Foi reprovado! </span> 
      <?php } ?>
    </form>


    <!--Inserir resultados na base de dados (Tabela result)
    <?php
    //Inserir os campos na tabela result
      $accountId = $_SESSION['user_id'];
      $quiz_category = $_SESSION['category'];
      $score = $_SESSION['scorefinal'];
      $qryfim = "INSERT into `result`(`user_id`, `cateogry_id`, `score`) VALUES ('$accountId','$quiz_category','$score')";
    ?>
-->

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
      <br>
      <!--BOTOES REDES SOCIAIS-->
      <div class="text-center">
        <p>Compartilhe o resultado com os seus amigos!</p>
        <!--Facebook-->
        <a class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
        <!--Twitter-->
        <a class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
        <!--Instagram-->
        <a class="ins-ic mr-3" role="button"><i class="fab fa-lg fa-instagram"></i></a>
        <!--WhatsApp-->
        <a class="whatsapp-ic" role="button"><i class="fab fa-lg fa-whatsapp"></i></a>
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