<?php 

include "connection.php";

 // 1) ficar parado se houver erro
 // 2) escrever a vermelho
 // 3) repete registo na bd : resolvido

 // dados de registo - nome, email, pass, repetir pass
 $name = $email = $psw = $psw_repeat = '';
 $errors = array('name' => '', 'email' => '', 'psw' => '', 'psw_repeat' => '');

 if(isset($_POST['submit'])){ 

  //Terminar de configurar janela para manter-se aberta (LAYLA)
    echo "
    <script type=\"text/javascript\">
    $(function() {                      
      $('#myModal').modal('show');    
    ;
    </script>";
   
   //check name
   if(empty($_POST['name'])){
     $errors['name'] = 'Um nome é obrigatório.';
   } else{
     $name = $_POST['name'];
     if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
       $errors['name'] = 'O nome só pode conter letras e espaços.';
     }
   }
   
   // check email
   if(empty($_POST['email'])){
     $errors['email'] = 'Um email é obrigatório.';
   } else{
     $email = $_POST['email'];
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['email'] = 'É necessário um endereço de email válido.';
     }
   }

   // check password
   if(empty($_POST['psw'])){
     $errors['psw'] = 'Uma palavra-passe é obrigatória.';
   } else{
     $psw = $_POST['psw'];
     if(!preg_match('#.*^(?=.{6,15})(?=.*[a-z])(?=.*[A-Z]).*$#', $psw)){
       $errors['psw'] = 'A palavra-passe têm de conter entre 6 a 15 caracteres, incluindo uma letra minúscula e uma letra maiúscula.';
     }
   }

   // check segunda versão da psw
   if(empty($_POST['psw_repeat']) || $_POST['psw'] !== $_POST['psw_repeat'])
   {
     $errors['psw_repeat'] = 'A palavra-passe digitada é diferente.';
   }


   if(array_filter($errors)){
     //echo 'errors in form';
   } else {
     // escape sql chars
     $name = mysqli_real_escape_string($conn, $_POST['name']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $psw = mysqli_real_escape_string($conn, $_POST['psw']);

     // create sql
     $sql = "INSERT INTO registos(email, name, psw) VALUES('$email','$name','$psw')";

     // save to db and check
     if(mysqli_query($conn, $sql)){
       // success
       header('Location: initialPage.php');
     } else {
       echo 'query error: '. mysqli_error($conn);
     }
   }
 }

?>