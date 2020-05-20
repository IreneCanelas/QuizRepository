<?php
    session_start();
    include "connection.php";

    $category=$_GET['category'];
    $_SESSION['category']=$category;
    $res=mysqli_query($conn, "SELECT * from questions where category='$category'");

//tempo
while ($row=mysqli_fetch_array($res)) 
{
    $_SESSION["exam_time"]=$row['exam_time_in_minutes'];
}
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>