<?php
    include "connection.php";
    $total_questions=0;

    $resl=mysqli_query($conn,"SELECT * from questions where category='$_SESSION[category]'");
    $total_questions=msqli_num_rows($res1);
    echo $total_questions;
?>