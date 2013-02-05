<?php
$server="localhost";
$user="root";
$password="";
$database="test";

$link = mysql_connect($server, $user, $localhost);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($database);
if($db_selected) {
    die('Could not select database: ' . mysql_error());
}
echo 'Connected successfully to database server';
?>