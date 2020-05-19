<?php
  include "connection.php";
  include "header2.php";
  session_start();
?>

<!---->
<?php 
// -- SELECIONAR CATEGORIA
    $category_selected = $_GET['category'];
    //echo $category_selected;
    $db = "SELECT id, question_num, question, opt1, opt2, opt3, opt4, answer, userans, category FROM questions where category='" . $category_selected ."'";
    $result = $conn->query($db);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $questions[] = $row;
      }
  } else {
      echo "Sem resultados";
  }
  //var_dump($questions);


//--CONTAGEM DE CLICKS
    //Se for um clique ou o inicio
    if (isset($_POST['click']) || isset($_GET['start'])) { ?>
      <div class="float-right mr-3 mt-3" id='demo'></div>
      <br>
      <div class="float-right mr-3" id='tenta'></div>
      <?php
          if(empty($category_selected)){
            echo "Variavel vazia";
          }
      @$_SESSION['clicks'] += 1 ;
      $c = $_SESSION['clicks'];

      if(isset($_POST['userans'])) 
        { 
          $userselected = $_POST['userans'];          
          $fetchqry2 = "UPDATE 'questions' SET 'userans'='$userselected' WHERE  'question_num'=$c-1 "; //WHERE 'question_num'=$c-1 FALTA VER A CATEGORIA PARA CHEGAR AO QUESTION_NUM CERTO
          $result2 = mysqli_query($conn,$fetchqry2);
        }
    } 
    
    else 
    {
      $_SESSION['clicks'] = 0;
      //echo "SESSAO NÃO INICIADA";
    }
    
    /*Quantidade de cliques, apagar depois
    echo "<br>";
    echo "Quantidade de clicks= ". $_SESSION['clicks'];*/
?>


<!--TITULO DA CATEGORIA   OK  -->

<div class="card centerdash mt-4" style="width: 50rem; margin:0 auto;">
  <div class="card-body">
      <div>
      <div class="text-center">
        <h3 class="card-title">Quiz de <?php echo $category_selected ?></h3>
        <!--<img src="images/vamoscomecar.png" class="center" alt="imagem final"><a>-->
      </div>



<!--Se clicks = 0, Botão de Start visível-->
<!-- Se clicks > 0 -> Botao hide -->

      <div class="container">
        <div class="row">
          <div class="col text-center">
            <div>
            <a href="examOK.php?category=<?php echo $category_selected?>&start"> <div class="bump"><br> <button class="btn btn-primary"float="left" ><span>Começar!</span></button></div> </a> 
            
          </div>
        </div>
      </div>
    </div>  
  </div>




<form action="" method="POST">
<!--Se click >= 1 dar inicio do Quiz-->
  <table>
    <?php if(isset($c)) 
      {   
        $fetchqry = "SELECT * FROM `questions` where `question_num`=$c and `category`='$category_selected'"; // `id`=$c and 
        $resultt=mysqli_query($conn,$fetchqry);
        $num=mysqli_num_rows($resultt);
        $row = mysqli_fetch_array($resultt,MYSQLI_ASSOC); 
      }      
    ?> 
      <tr>
        <td>
          <h3><br><?php echo @$row['question'];?></h3>
        </td>
      </tr>      
      <!--Se o click estiver entre 1 e 10 continuar a mostrar as perguntas-->
      <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 11){ echo $result->num_rows?>
      
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
        <br>
        <br>
        <br>
        </td>
      </tr>

      <tr>
        <td>
        <!--Botão Próxima pergunta-->
        <button class="button3" name="click">Próxima</button>
        <br>
        <br>
        <br>        
        </td>
      </tr> 
      <?php }?>
 
  </table>
</form>
 

<!--ESTÁ A FUNCIONAR - VAI PARA PAGINA SEGUINTE-->
<form action="result.php">
  <?php if($_SESSION['clicks']>10){ ?>
    <div class="container">
        <div class="row">
          <div class="col text-center">
    <button class="btn btn-primary" name="click" onclick="result">Resultado</button>
    </div>
    </div>
    </div>
  
    <?php 
    //echo "entrei no if ==11";
    $qry3 = "SELECT `answer`, `userans` FROM `questions` "; //WHERE `id`<=10"
    $result3 = mysqli_query($conn,$qry3);
    $storeArray = Array();
    unset($_SESSION["score"]);
    while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
      if($row3['answer']==$row3['userans']){
      @$_SESSION['score'] += 1 ;
      /*echo "<br>";
      echo "SCORE = ".@$_SESSION['score'];
      echo "<br>";
      echo "USERANS = ".$row3['userans'];*/
    }
    } ?>
  </form>
<?php } ?>
</div>
</div> 
<br>
<br>

<script>
  // countdown
function countdown() {
    var seconds = 10;
    //var mins = 1;
    function tick() {
        var counter = document.getElementById("demo");
        //var current_minutes = mins-1
        seconds--;
        counter.innerHTML = /*current_minutes.toString()*/ '0:' + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
        } else if( seconds == 0)
        {
          document.getElementById('tenta').style.color = "red";
          document.getElementById('tenta').innerHTML = 'Acabou o tempo! Passe para a próxima pergunta!';
        }
    }
    tick();
}
countdown();

/*else {
            if(mins > 1){
                countdown(mins-1);           
            }
        }*/
</script>



<!--ACRESCENTAR FOOTER-->
<?php
    include "footer.html";
?>