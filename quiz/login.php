<?php
include "connection.php"
include "registo.php"
// começar ou retomar uma sessão
session_start();
 
// se vier um pedido para login
if (!empty($_POST)) {
 
	// estabelecer ligação com a base de dados
	mysql_connect('localhost', 'email', 'psw') or die(mysql_error());
	mysql_select_db('registos');
 
	// receber o pedido de login com segurança
	$email = mysql_real_escape_string($_POST['email']);
	$psw = sha1($_POST['psw']);
 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
	$login = mysql_query("SELECT id, email FROM registos WHERE email = '$email' AND psw = '$psw'");
 
	if ($login && mysql_num_rows($login) == 1) {
 
		// o utilizador está correctamente validado
		// guardamos as suas informações numa sessão
		$_SESSION['id'] = mysql_result($login, 0, 0);
		$_SESSION['username'] = mysql_result($login, 0, 1);
 
		echo "<p>Sess&atilde;o iniciada com sucesso como {$_SESSION['username']}</p>";
	} else {
 
		// falhou o login
		echo "<p>Email ou password invalidos. <a href=\"login.php\">Tente novamente</a></p>";
	}
}
?>