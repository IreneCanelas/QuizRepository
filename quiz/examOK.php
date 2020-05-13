<?php
    include "connection.php";
    //include "quizzes.php";
    session_start();
    //include "header.php";
?>

<div class="title">TITULO DO QUIZ</div>
<?php   

    //Se for um clique ou o inicio
    if (isset($_POST['click']) || isset($_GET['start'])) {
      echo "<br>";
      echo "ENTREI NO PRIMEIRO IF";
      echo "<br>";
      echo "POST= ";
      var_dump($_POST);
      echo "<br>";
      echo "GET= ";
      var_dump($_GET);
      //Somar +1 no valor de clicks
      @$_SESSION['clicks'] += 1 ;
      //$clicks++;
      echo "<br>";
      echo "SESSION= ";
      //var_dump($_SESSION);
      //$c = @$_SESSION['clicks'];
      $c = $_SESSION['clicks'];
      echo "<br>";
      echo "valor de c= ";
      echo $c; 

      if(isset($_POST['userans'])) 
        { 
          //Atualizar a coluna userans com a resposta selecionada pelo utilizador
          echo "<br>";
          echo "<br>";
          echo "ENTREI NO SEGUNDO IF";
          echo "<br>";
          echo "valor de c= ";
          echo $c; 
          $userselected = $_POST['userans'];          
          $fetchqry2 = "UPDATE `questions` SET `userans`='$userselected' WHERE `id`=$c-1";
          echo "<br>";
          echo "valor de c= ";
          echo $c-1; 
          echo "<br>";
          echo "valor de USERANS= ";
          echo $userselected; 
          $result2 = mysqli_query($conn,$fetchqry2);
        }
    } 
    
    else 
    {
      $_SESSION['clicks'] = 0;
      echo "SESSAO NÃO INICIADA";
    }
    
    //Quantidade de cliques, apagar depois
    echo "<br>";
    echo "Quantidade de clicks= ". $_SESSION['clicks'];
?>

<!--Se clicks = 0, Botão de Start visível-->
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button class="button" name="start" float="left"><span>Começar!</span></button> <?php } ?></form></div>


<form action="" method="POST">
<!--Se click >= 1 dar inicio do Quiz-->
  <table>
    <?php if(isset($c)) 
      {   
        $fetchqry = "SELECT * FROM `questions` where id='$c'"; 
        $result=mysqli_query($conn,$fetchqry);
        $num=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
      }
    ?>
      <tr>
        <td>
          <h3><br><?php echo @$row['question'];?></h3>
        </td>
      </tr> 
      
      <!--Se o click estiver entre 1 e 5 continuar a mostrar as perguntas-->
      <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 11){ ?>
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
      
      <!--Botão Próxima pergunta-->
      <tr>
        <td>
        <button class="button3" name="click">Próxima!</button>
        <br>
        <br>
        <br>
        
        </td>
      </tr> 
    <?php } ?> 
  </table>
</form>

<?php if($_SESSION['clicks']>10){
	$qry3 = "SELECT `answer`, `userans` FROM `questions`;";
	$result3 = mysqli_query($conn,$qry3);
	$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['answer']==$row3['userans']){
		 @$_SESSION['score'] += 1 ;
	 }
  }
}
?> 

