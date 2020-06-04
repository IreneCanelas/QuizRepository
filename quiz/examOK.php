<?php
  session_start();
  include "connection.php";
  if (isset($_SESSION['user_id'])) {
    include "headerAfterLogin.php";
  }
  else { include "header2.php"; }
  
  /*
  if(!isset($_SESSION['countdown'])) 
  {
    $_SESSION['countdown'] = 120;
    $_SESSION['time_started'] = time();
  }

  $now = time();

  $timeSince = $now - $_SESSION['time_started'];

  $remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

  if($remainingSeconds < 1)
  {
    $remainingSeconds = 0;
    $_SESSION['countdown'] = 0;
    $_SESSION['time_started'] = 0;
    $timeSince = 0;
  }
  $count = 0;
  */

  

?>


<!---->
<?php 
// -- SELECIONAR CATEGORIA
    $category_selected = $_GET['category'];
    $db = "SELECT id, question_num, question, opt1, opt2, opt3, opt4, answer, userans, category FROM questions where category='" . $category_selected ."'";
    $result = $conn->query($db);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $questions[] = $row;
      }
  } else {
      echo "Sem resultados";
  }



//--CONTAGEM DE CLICKS
    //Se for um clique ou o inicio
    if (isset($_POST['click']) || isset($_GET['start'])) { ?>
      <!--<div class="float-right mr-3 mt-3" id='lugar'></div>
      <br>
      <div class="float-right mr-3" id='tenta'></div>-->
      <?php
          if(empty($category_selected)){
            echo "Variavel vazia";
          }
      @$_SESSION['clicks'] += 1 ;
      $c = $_SESSION['clicks'];

      if(isset($_POST['userans'])) 
        {
          $userselected = $_POST['userans'];          
          $fetchqry2 = "UPDATE questions SET userans='".$userselected."' WHERE question_num=".$c."-1 and category='".$category_selected."'"; //WHERE 'question_num'=$c-1 FALTA VER A CATEGORIA PARA CHEGAR AO QUESTION_NUM CERTO
          $result2 = mysqli_query($conn,$fetchqry2);
        }
    } 
    
    else 
    {
      $_SESSION['clicks'] = 0;
    }

    $_SESSION['category'] = $category_selected;
    $_SESSION['numberOfQuestions'] = $result->num_rows;
    //echo $_SESSION['user_id'];
?>

<!--TITULO DA CATEGORIA-->
<div class="card centerdash col-md-4 mt-5" style=" margin:0 auto;">
  <div class="card-body">
      <div>
      <div class="text-center">
        <h3 class="card-tile"> Quiz de <?php echo $category_selected ?></h3> <hr>
      </div>
      <br>
      <!--<text> Tempo: <text id='time001'>10</text></text>-->

<!--Se clicks = 0, Botão de Start visível-->
<!-- Se clicks == 0 -> Botao hide -->
      <?php if($_SESSION['clicks'] == 0) { ?> 
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <div>
              <a href="examOK.php?category=<?php echo $category_selected?>&start"> <div class="bump"><br> <button class="btn btn-primary" float="left"><span>Começar!</span></button></div> </a> 
              <?php
              //Variável Data do início da realização do quiz
                $date = date('H:i:s');
                $datetime1 = new Datetime($date);
                $_SESSION['initialTime'] = $datetime1; ?>
            </div>
          </div>
        </div>
      <?php }?>
    </div>  
  </div>

<form action="" method="POST">
<table>
    <?php if(isset($c)) 
      { 

        $fetchqry = "SELECT * FROM `questions` where `question_num`=".$c." and  `category`='$category_selected'";
        $resultt=mysqli_query($conn,$fetchqry);
        $num=mysqli_num_rows($resultt);
        $row = mysqli_fetch_array($resultt,MYSQLI_ASSOC);
        
      }      
    ?> 
      <tr>
        <td>
          <h4><br><?php echo @$row['question'];?></h4>
        </td>
      </tr>
      <!--Se o click estiver entre 1 e nº total de perguntas por categoria continuar a mostrar as perguntas-->
      <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < $result->num_rows+1){ ?>

        <div class="firstClass" style="max-width:15%"> <?php echo $row['question_num']. "/". $result->num_rows?> </div>
        
      <tr>
        <td>
          <input required type="radio" name="userans" value="<?php echo $row['opt1'];?>">&nbsp;<?php echo $row['opt1']; ?>
          <br>
        </td>
      </tr>
      <tr>
        <td>
        <input required type="radio" name="userans" value="<?php echo $row['opt2'];?>">&nbsp;<?php echo $row['opt2'];?>
        </td>
      </tr>
      <tr>
        <td>
        <input required type="radio" name="userans" value="<?php echo $row['opt3'];?>">&nbsp;<?php echo $row['opt3']; ?>
        </td>
      </tr>
      <tr>
        <td>
        <input required type="radio" name="userans" value="<?php echo $row['opt4'];?>">&nbsp;<?php echo $row['opt4']; ?>
        <br><br><br>
        </td>
      </tr>
      <tr>
        <td>
      <div class="flex1234">
        <div>
        <!--Botão Próxima pergunta-->
        <button class="btn btn-dark" name="click">Próxima</button>
        </div>
        <div class='absolute'>
        <input type="text" id="timespent" value="00:00">
        </div>
      </div> 
      <?php }?>
        </td>
      </tr>
 
  </table>
</form>
 

<form action="result.php">
  <?php if($_SESSION['clicks']>$result->num_rows){ ?>
    <div class="container">
        <div class="row">
          <div class="col text-center">
    <button class="btn btn-primary" name="click" onclick="result">Resultado</button>
    </div>
    </div>
    </div>
  
    <?php 
    $qry3 = "SELECT `answer`, `userans` FROM `questions` where category='".$category_selected."'"; //WHERE `id`<=10"
    $result3 = mysqli_query($conn,$qry3);
    $storeArray = Array();
    $_SESSION["score"] = 0;
    while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
      if($row3['answer']==$row3['userans']){
      $_SESSION['score'] += 1 ;
    }
    }
    ?>
  </form>
<?php } ?>
</div>
</div> 
<br>
<br>


<!-- Configuração do timer -->
<script>
 window.onload = function startTimer() {
      var tobj = document.getElementById("timespent");
      var t = "0:00";
      var s = 00;
      var d = new Date();
      var timeint = setInterval(function () {
        s += 1;
        d.setMinutes("0");
        d.setSeconds(s);
        min = d.getMinutes();
        sec = d.getSeconds();
        if (sec < 10) sec = "0" + sec;
        val = document.getElementById("timespent").value = min + ":" + sec;
      }, 1000);
      tobj.value = t;
    }

    if (window.addEventListener) {              
      window.addEventListener("load", startTimer);
    } 

    else if (window.attachEvent) {                 
      window.attachEvent("onload", startTimer);
    }

</script> 

<!--
<script>
  function timer001()
  {
    c = c - 1;
    if(c < 10)
    {
      tempo.innerHTML = c;
    }

    if(c < 1)
    {
      window.clearInterval(update);
    }
  } 

  update = setInterval("timer001()", 1000);

  timer001();
</script>

<script>
      function continua()
      {
        $temp = $count;
        
        document.getElementById("tempo").innerHTML = ($tem = $temp +1)
      }
</script>
-->

<!--ACRESCENTAR FOOTER-->
<?php
    include "footer.html";
?>