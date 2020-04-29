<?php
    session_start();
    include "connection.php";

    $category=$_GET['name'];
    $_SESSION['category']=$category;
    $res=mysqli_query($conn, "SELECT * from questions where category='$category'");

//tempo
//while ($row=msqli_fetch_array($res)) {
//   $_SESSION['']
//

?>