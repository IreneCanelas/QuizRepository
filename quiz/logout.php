<?php
    //session_start();
    //session_destroy();
    //unset($_SESSION['user_id']);
    session_start();
    unset($_SESSION["user_id"]);
    //$_SESSION['user_id'] == NULL;
    header("Location: index.php");
    exit;
?>