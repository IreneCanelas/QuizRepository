<?php

include "connection.php";

$id="";
$question_num="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$category="";
$count=0;
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno])) {
    $ans=$_SESSION["answer"][$queno];
}

<<<<<<< HEAD
$res=msqli_query($link, "select * from questions where category='$_SESSION[category]' && question_num=$_GET[questionno]");
$count=mysqli_num_rows($res);
=======
$res=msqli_query($link, "SELECT * from questions where category='$_SESSION[category]' && questionnum=$_GET[question_num]");
$count=msqli_num_rows($res);
>>>>>>> de629e664d0995f80b004c09102d12a72bd02d41

if ($count==0) {
   echo "over";
}
else {
    while($row=msqli_fetch_array($res)) {
        $questionnum=$row["question_num"];
        $question=$row["question"];
        $opt1=$row["op1"];
        $opt2=$row["op2"];
        $opt3=$row["op3"];
        $opt4=$row["op4"];

    }
//}
?>
    <br>
    <!-- imprimir questao -->
    <table>
        <tr>
            <td style='font-weight:bold; font-size:18px' colspan='2'>
            <?php echo "(".$questionnum ." ) ".$question;?>
        </tr>
    </table>

    <!-- imprimir opcoes -->
    <table style="margin-left: 20px">
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>">
                <?php
                    if($ans==$opt1) {
                        echo "checked";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?>">
                <?php
                    if($ans==$opt2) {
                        echo "checked";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>">
                <?php
                    if($ans==$opt3) {
                        echo "checked";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>">
                <?php
                    if($ans==$opt4) {
                        echo "checked";
                    }
                ?>
            </td>
        </tr>
    </table>
