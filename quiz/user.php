<?php
    include "headerAfterLogin.php";
    include "connection.php";
    session_start();

    //Base de Dados e Tabela client
    $useridfinal = $_SESSION['user_id'];
    $qry = "SELECT name, email FROM registos where id='$useridfinal'";
    $result = mysqli_query($conn, $qry);

    //Base de Dados e Tabela result
    $qry2 = "SELECT id, user_id, quiz_category, correct_num, score FROM result where user_id='$useridfinal'";
    $result2 = mysqli_query($conn, $qry2);
    

?>

<div class="container padding-bottom-3x mb-2 mt-2">
    <div class="row">
        <div class="col-lg-12">
            <aside class="user-info-wrapper">
                <div class="user-cover">
                    <div class="info-label" title=""><i class="icon-medal"></i>290 pontos</div>
                </div>
                <div class="user-info">
                    <div class="user-avatar">
                        <a class="edit-avatar" href="#"></a><img src="images/utilizador.png" alt="User"></div>
                    <div class="user-data">
                        <h4><?php 
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo $row['name']; }
                        
                        else echo "Username não definido." ?></h4><span>Entrou em 06 de Maio de 2020</span>
                    </div>
                </div>
            </aside>
            <nav class="list-group">
                <!--<a class="list-group-item with-badge" href="#"><i class="fa fa-th"></i>Orders<span class="badge badge-primary badge-pill">6</span></a>
                <a class="list-group-item" href="#"><i class="fa fa-map"></i>Addresses</a>
                <a class="list-group-item with-badge" href="#"><i class="fa fa-heart"></i>Wishlist<span class="badge badge-primary badge-pill">3</span></a>-->
                
                <!--Abrir perfil-->
                <a class="list-group-item" onclick="showAndHideProf()"><i class="fa fa-user"></i> Perfil</a>
                    <div id="profileDiv"  style="display:none;" class="border" >
                        <ul><br> 
                            <li>Jogador: <?php echo $row['name']; ?></li>
                            <li>Email: <?php echo $row['email']; ?></li>
                        </ul>
                    </div>
                
                <script type="text/javascript">
                    function showAndHideProf() {
                    var x = document.getElementById("profileDiv");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }             
                </script>


                <!--Abrir resultados do quiz-->
                <a class="list-group-item with-badge bg-light " onclick="showAndHideResult()">
                <i class="fas fa-trophy"></i> Meus quizzes<span class="badge badge-warning badge-pill">4</span></a>
                <div id="resultsDiv"  style="display:none;" class="border" >
                    <?php 
                        if (mysqli_num_rows($result2) > 0) {
                            $row2 = mysqli_fetch_assoc($result2);?>
                            <ul><br> 
                                <li><?php  echo $row2['quiz_category'];echo $row2['correct_num'];echo $row2['score']; ?></li>
                            </ul>
                           <?php } 
                        
                        else ?><br><?php echo "Ainda não realizou nenhum quiz." ?><br>                    
                </div>

                <script type="text/javascript">
                    function showAndHideResult() {
                    var x = document.getElementById("resultsDiv");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }             
                </script>

            </nav>
        </div>
    </div>   
</div>


<?php
    include "footer.html";
?>


