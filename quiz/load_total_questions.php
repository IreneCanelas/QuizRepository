<?php
    session_start();

    include "connection.php";
    $total_questions=0;

    //conferir o que retorna em SESSION
    var_dump($_SESSION);

    $validCategory = mysqli_real_escape_string($conn, $_SESSION['category']);

    $res1=mysqli_query($conn,"SELECT * from questions where category='$validCategory'");
    $total_questions=mysqli_num_rows($res1);

    echo $total_questions;
?>