<?php
include "connection.php";
include "header2.php";
?>

<!-- Grid column -->
<div class="col-lg-4 col-md-12 mx-auto mt-3">

<!--Card Narrower-->
<div class="card card-cascade narrower">

  <!--Card image-->
  <div class="view view-cascade overlay">
    <img src="images/fundo.jpg" class="card-img-top"
      alt="imagem final">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
  <!--/.Card image-->

  <!--Card content-->
  <div class="card-body card-body-cascade">
    <h4 class="text-warning text-center"><i class="fas fa-poll"></i> Resultado</h5><br>  <!--Cor do texto não está a funcionar-->
    <!--Title
    <h5 class="card-title">Veja aqui seu desempenho:</h4>-->
    <!--Text-->
    <p class="card-text "><span>Respostas corretas:&nbsp;<?php echo $no = @$_SESSION['score'];
            session_unset(); ?></span><br>
            <span>Pontuação final:&nbsp<?php echo $no*2; ?></span>
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
            <div class="text-center">
            <p>Compartilhe o resultado com seus amigos!</p>
            <!--Facebook-->
            <a class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
            <!--Twitter-->
            <a class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
            <!--Instagram-->
            <a class="ins-ic mr-3" role="button"><i class="fab fa-lg fa-instagram"></i></a>
            <!--WhatsApp-->
            <a class="whatsapp-ic" role="button"><i class="fab fa-lg fa-whatsapp"></i></a></div>

  </div>
  <!--/.Card content-->

</div>
<!--/.Card Narrower-->

</div>
<!-- Grid column -->
</div>

<?php
    include "footer.html";
?>