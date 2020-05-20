<?php

include "header2.php";
?>

<div class="centerdash" style="width: 21.5em;margin:0 auto;">  
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
        
            <div>
                <h5 class="card-title">Quiz de <nomedoQuiz> </h5>
                <!--Aqui vai aparecer questão "1/4"... -->
                <!--Número da questão no início do card-->
                <div id="current_que">0</div>
                <div>/</div>
                <!--Não anda, não funciona-->
                <div id="total_questions">0</div>
            </div>

        <!--Ler as questões-->
            <div>
                <!--Não funciona-->
                <p>Aparecer questões aqui embaixo:</p>
                <div id="load_questions">
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
        </div>
    </div>
</div>

<script type="text/javascript">
    function load_total_questions()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("total_questions").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","foarajax/load_total_questions.php", true);
        xmlhttp.send(null);
    }

    //no need to declare variable $questionno = $_POST['questionno'] ?? '';
    
    var questionno="1";
    load_questions(questionno)

    function load_questions(questionno) {

        document.getElementById("current_que").innerHTML=questionno;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText=="over")
                {
                    window.location="result.php";
                }
                else{
                    document.getElementByID("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_questions();
                }
            }
        };
        xmlhttp.open("GET","foarajax/load_questions.php?questionno="+ questionno, true);
        xmlhttp.send(null);
    }

    function load_previous()
    {
        if (questionno=="1")
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

<?php 
  include "footer.html";
?>
