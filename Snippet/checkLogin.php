<?php
session_start();
if(not isset($_SESSION['session_user'])){
	header('Location: login.php');
}
?>