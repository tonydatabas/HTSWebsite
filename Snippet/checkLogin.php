<?php
session_start();
if(not isset($_SESSION['views'])){
	header('Location: login.php');
}
?>