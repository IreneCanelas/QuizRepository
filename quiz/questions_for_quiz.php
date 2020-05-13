<?php
    include "header2.php";
    include "connection.php";
    //include "quizzes.php";
    //session_start();
    //include "header.php";
    //include "set_category_type_session.php";
?>

<?php 

    $category_selected = $_GET['category'];
    $db = "SELECT id, question_num, question, opt1, opt2, opt3, opt4, answer, userans, category FROM questions where category='" . $category_selected ."'";
    $result = $conn->query($db);
    $questions = [];
  
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $questions[] = $row;
      }
  } else {
      echo "Sem resultados";
  }
?>

    <div class="card text-center centerdash" style="width: 50rem; margin:0 auto;">
        <div class="card-body">
            <div>
            <h5 class="card-title">Quiz de <?php echo $category_selected ?> </h5>
            <?php foreach ($questions as $question ) { ?>   
        <!--Ler as questões-->
              <div>
              <tr>
                <td>
                  <p><?php echo $question['question']; ?> </p>
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  <input required type="radio" name="userans">&nbsp;<?php echo $question['opt1']; ?>
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                <input required type="radio" name="userans">&nbsp;<?php echo $question['opt2'];?>
                </td>
              </tr>
              <tr>
                <td>
                <input required type="radio" name="userans">&nbsp;<?php echo $question['opt3']; ?>
                </td>
              </tr>
              <tr>
                <td>
                <input required type="radio" name="userans" >&nbsp;<?php echo $question['opt4']; ?>
                <br>
                <br>
                <br>
                </td>
              </tr>
              </div>
          <?php }?>        
      </div>
  </div>
<!--Botões Prev e Next-->
    <div class="row" style="margin-top:10px">
        <div style="min-height: 10px">
            <div class="col-lg-12 text-center">
            <input type="button" id="btnPrevious" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
            <input type="button" id="btnNext" class="btn btn-success" value="Next" onclick="load_next();">&nbsp;
            </div>
        </div>
    </div>

<?php
if(isset($_POST['userans'])) {
  $userselected = $_POST['userans'];          
    $fetchqry2 = "UPDATE `questions` SET `userans`='$userselected' WHERE `id`=$c-1";
}

?>
<script type="text/javascript">

  function load_previous()
    {
      var questionno = $question['question_num'];
        if (questionno!="1")
        {
            load_questions(questionno);
        }
        else
        {   
            questionno=eval(questionno)-1;
            load_questions(questionno);
        }
    }

    function load_next()
    {   
        questionno=eval(questionno)+1;
        load_questions(questionno);
    }

</script>

<!-- <?php
    include "footer.html";
?> -->