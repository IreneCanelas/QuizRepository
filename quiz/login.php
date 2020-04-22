<?php
include "connection.php";

if(empty($_POST['email']) || empty($_POST['psw'])) {
	header('Location: initial')
}