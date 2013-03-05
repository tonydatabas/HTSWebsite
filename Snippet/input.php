<?php
         $query = "INSERT INTO Persons (name) VALUES ('$_POST[name]')";
         //echo '<em> ' . $query . ' </em>';
         $result = mysql_query($query);
         if ($result === false) {
	         echo '<strong> Error when tring to add data to database. ' . mysql_errno . ' : <br />' . mysql_error . '</strong>';
        }
?>
