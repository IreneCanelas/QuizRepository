<?php
    include "headerAfterLogin.php";
    include "connection.php";
    session_start();

    //Base de Dados e Tabela client
    $useridfinal = $_SESSION['user_id'];
    $qry = "SELECT name FROM registos where id='$useridfinal'";
    $result = mysqli_query($conn, $qry);
    

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
                <a class="list-group-item" href="#"><i class="fa fa-user"></i> Perfil</a>


                <!--Abrir resultados do quiz-->
                <a class="list-group-item with-badge bg-light " data-target="#myModal" data-toggle="modal" class="meusResultados" id="meusResultados" href="#myModal">
                    <i class="fas fa-trophy"></i> Meus quizzes<span class="badge badge-warning badge-pill">4</span></a>
            </nav>
        </div>
    </div>   
</div>

    <div id="myModal" class="modal fade">
          <form class="modal-content" action="" method="">
            <div class="modal-header"></div>
            <div class="container">
              <h1>Meus resultados</h1>
              <hr>
              <?php
                $sq = "SELECT id, user_id, category_id, score, num_questions FROM result";
                    $result = $conn->query($sq);
                    $user = [];

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $user[] = $row;
                        }
                    } //else {
                    //  echo "0 results";   
                    //}
                ?>

            <!--Botão Cancelar -->
            <button value="Hover" type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Minha Conta</button>
            </div>
        </div>
        </form>
    </div>

<?php
    include "footer.html";
?>


