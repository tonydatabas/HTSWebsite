<?php
$query = "SELECT id, name FROM test";
//echo $query; 
$result = mysql_query($query) or die('Could : ' . mysql_error());

$num=mysql_numrows($result);
if($num==0) {
    echo '<strong>Your question is empty</strong>';
}
else {
echo "<ol>";
for ($i=0;$i<$num;$i++) {
    $temp = mysql_fetch_array($result);
	echo "<li>" . $temp["namn"] . "</li>";
}
echo "</ol>";
}
?>