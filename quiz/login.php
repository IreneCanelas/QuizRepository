<?php

include "connection.php";
include "registo.php";

session_start();     
    //O campo email e password preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['psw']))){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
		$psw = mysqli_real_escape_string($conn, $_POST['psw']);
		
		
        //Buscar na tabela registos o user que corresponde com os dados colocados no formulário
        $result_registo = "SELECT * FROM registos WHERE email = '$email' && psw = '$psw' LIMIT 1";
        $resultado_registo = mysqli_query($conn, $result_registo);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['registoId'] = $resultado['id'];
            $_SESSION['registoName'] = $resultado['name'];
            $_SESSION['registoEmail'] = $resultado['email'];
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Email ou password Inválido";
            header("Location: initialPage.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Email ou password inválido";
        header("Location: initialPage.php");
    }

?>