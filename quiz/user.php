<?php
    include "headerAfterLogin.php";
    include "connection.php";


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

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> QuizQuiz Website </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div><img class="w-100" src="images/underconstruction.jpg"></div> 
    
</body>

</html>
