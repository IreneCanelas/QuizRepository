<?php

include "connection.php";
include "registo.php";

session_start();

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['psw']) ) {
	// Could not get the data that should have been sent.
	exit('Por favor preencha os campos email e password');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, psw FROM registos WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();

	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $psw);
		$stmt->fetch();
		// Account exists, now we verify the password.
		
		if ($_POST['psw'] === $psw) {
			// Verification success! User has loggedin!
			// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			echo 'Bem vindo,  ' . $_SESSION['name'] . '!';
		} else {
			echo 'Password errada!';
		}
	} else {
		echo 'Email errado!';
	}

	$stmt->close();
}
?>