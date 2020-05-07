<?php
    //session_start();
//session_start();

    include "connection.php";
    include "header.php";
include "connection.php";
include "header.php";
?>

<div>
  <?php 
    $res=mysqli_query($conn,"select * from quizzes");
    while($row=mysqli_fetch_array($res))
    {
      ?>
      <input type="button" class="btn btn-success form-control" value="<?php echo $row["name"]; ?>" style="margin-top: 10px; background-color: blue; color: white" onclick="set_category_type_session(this.value);">

      <?php
    } 
    ?>
<?php 
$res=mysqli_query($conn,"select * from quizzes");
$res=mysqli_query($conn,"SELECT * from quizzes");
while($row=mysqli_fetch_array($res))
{
  ?>
</div>

<?php 
  include "footer.html";
include "footer.html";

?>

  
<script type="text/javascript">
  function set_category_type_session(quizzes) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        window.location = "dashboard.php";
      }
    };
    xmlhttp.open("GET","foarajax/set_category_type_session.php?quizzes="+ quizzes, true);
    xmlhttp.send(null);
  }
</script>

    window.location = "dashboard.php";
  }
};
xmlhttp.open("GET","foarajax/set_category_type_session.php?quizzes="+ quizzes, true);
xmlhttp.open("GET","set_category_type_session.php?quizzes="+ quizzes, true);
xmlhttp.send(null);
}
</script>