<?php

include "connection.php";
include "registo.php";

session_start(); 
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['psw']))){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $psw = mysqli_real_escape_string($conn, $_POST['psw']);

            
        //Buscar na tabela registos o usuário que corresponde com os dados digitado no formulário
        $result_registos = "SELECT * FROM registos WHERE email = '$email' && psw = '$psw' LIMIT 1";
        $resultado_registos = mysqli_query($conn, $result_registos);
        $resultado = mysqli_fetch_assoc($resultado_registos;
        
        //Encontrado um user na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['registosId'] = $resultado['id'];
            $_SESSION['registosName'] = $resultado['name'];
            $_SESSION['registosEmail'] = $resultado['email'];
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Email ou password inválidos";
            header("Location: initialPage.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Email ou password inválidos";
        header("Location: initialPage.php");
    }

?>