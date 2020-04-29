<?php
    include "connection.php";

    $category=$_GET['name'];
    $_SESSION['category']=$category;
    $res=msqli_query("select * from questions where category='$category'");

//tempo
//while ($row=msqli_fetch_array($res)) {
//   $_SESSION['']
}

?>