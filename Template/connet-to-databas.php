<?php
$server="localhost";
$user="root";
$password="";
$database="test";

$link = mysql_connect($server, $user, $localhost);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully to database server';

$query = mysql_query("SELECT id, name, location, amountRequested FROM fundable");

while ($temp = mysql_fetch_array($query)) {
	echo $temp;
}

mysql_select_db($database="");
?>

<?php
   mysql_close($con);
?>