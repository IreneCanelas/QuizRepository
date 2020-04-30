<?php
include "header2.php";
?>

<div class="centerdash" style="width: 21.5em;margin:0 auto;">
    <div>    
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 id="current_que" class="card-title">Question</h5>
                <div id="load_questions">
                    <div id="total_questions">
                        <p class="card-text">Op1</p>
                        <p class="card-text">Op2</p>
                        <p class="card-text">Op3</p>
                        <p class="card-text">Op4</p>
                    </div>
                    <div class="row" style="margin-top:10px">
                        <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
                            <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
        <!--Início da edição
        <br>
        <div class="row">
            <br>
            <div class="col-lg-2 col-lg-push-10">
                <div id="current_que" style="float:left">0</div>
                <div style="float:left">0</div>
                <div id="total_questions" style="float:left">0</div>
            </div>
            <div class="row" style="magin-top: 30px">
                
                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white" id="load_questions">
                    </div>
                </div> 
        </div>
        <div class="row" style="margin-top:10px">
            <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
                <div class="col-lg-12 text-center">
                    <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                    <input type="button" class="btn btn-success" value="Next" onclick="load_next();">&nbsp;
                </div>
            </div>
        </div>
        <!--Fim da edição-->
    </div>
</div>

<script type="text/javascript">
    function load_total_questions()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("total_questions").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","load_total_questions.php", true);
        xmlhttp.send(null);
    }

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
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","load_questions.php?questionno="+ questionno, true);
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

    function load_previous()
    {   
        questionno=eval(questionno)+1;
        load_questions(questionno);
    }

</script>

<?php 
  include "footer.html";
?>
