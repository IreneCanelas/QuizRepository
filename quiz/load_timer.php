<?php

echo 'oi';
session_start();
date_default_timezone_set('Europe/lisbon');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "3 minutes"));
$_SESSION["exam_start"]="yes";


if(!isset($_SESSION["end_time"])){
    echo "00:00:00";
}
else{
    $time1=gmdate("H:i:s", strtotime($_SESSION["end_time"]) - strtotime(date("Y-m-d H:i:s")));
    if(strtotime($_SESSION["end_time"])<strtotime(date("Y-m-d H:i:s")))
    {
        echo "00:00:00";
    }
    else{
        echo $time1;
    }
}

echo 'oi';

?>