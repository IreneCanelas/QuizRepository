<?php 

include "connection.php";

 // dados de registo - nome, email, pass, repetir pass
 $name = $email = $psw = $psw_repeat = '';
 $errors = array('name' => '', 'email' => '', 'psw' => '', 'psw_repeat' => '');
 $error = false;

 if(isset($_POST['submit'])){ 

  //Terminar de configurar janela para manter-se aberta (LAYLA)
   /* echo "
    <script type=\"text/javascript\">
    $(function() {                      
      $('#myModal').modal('show');    
    ;
    </script>";*/
   
   // verificar validação de nome
   if(empty($_POST['name'])){
     $error = true;
     $errors['name'] = 'Um nome é obrigatório.';
   } else{
     $name = $_POST['name'];
     if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
       $error = true;
       $errors['name'] = 'O nome só pode conter letras e espaços.';
     }
   }
   
   // verificar validação de email
   if(empty($_POST['email'])){
     $error = true;
     $errors['email'] = 'Um email é obrigatório.';
   } else{
     $email = $_POST['email'];
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $error = true;
       $errors['email'] = 'É necessário um endereço de email válido.';
     }
   }

   // verificar validação de password
   if(empty($_POST['psw'])){
     $errors['psw'] = 'Uma palavra-passe é obrigatória.';
     $error = true;
   } else{
     $psw = $_POST['psw'];
     if(!preg_match('#.*^(?=.{6,15})(?=.*[a-z])(?=.*[A-Z]).*$#', $psw)){
       $error = true;
       $errors['psw'] = 'A palavra-passe têm de conter entre 6 a 15 caracteres, incluindo uma letra minúscula e uma letra maiúscula.';
     }
   }

   // verificar validação de password - repetição
   if(empty($_POST['psw_repeat']) || $_POST['psw'] !== $_POST['psw_repeat'])
   {
     $error = true;
     $errors['psw_repeat'] = 'A palavra-passe digitada é diferente.';
   }

   if($error)
   {
    echo '<script>$("#myModal").modal("show");</script>';
   }

   if(array_filter($errors)){
     //echo 'errors no form';
   } else {
     $name = mysqli_real_escape_string($conn, $_POST['name']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $psw = mysqli_real_escape_string($conn, $_POST['psw']);

     // criar sql
     $sql = "INSERT INTO registos(email, name, psw) VALUES('$email','$name','$psw')";

     // guardar na bd e check
     if(mysqli_query($conn, $sql)){
       // sucesso
       $var = $_SERVER['PHP_SELF'];
       header('Location: initialPage.php?action=success' );
       //Não funciona ainda
       if( $_GET['action'] == "success" ) {
        echo "<script language='javascript' type='text/javascript' align='center'>
        alert('Login efetuado com sucesso!.');
        window.location.replace('http://localhost/initialPage.php'); </script>";
        }
     } 
     else {
       echo 'query error: '. mysqli_error($conn);
     }
   }
 }
?>