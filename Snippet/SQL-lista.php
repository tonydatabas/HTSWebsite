<?php
$query = "SELECT id, name FROM test";
echo $query; 
$result = mysql_query($query) or die('Could : ' . mysql_error());

if(mysql_numrows($result)) {
    echo 'Your question is empty';
}

echo "<ol>"
while ($temp = mysql_fetch_array($query)) {
	echo "<li>" . $temp[namn] . "</li>";
}
echo "</ol>"

?>