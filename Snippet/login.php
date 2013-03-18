<!-- Kom ihåg att logga in till databasen först! -->
<?php
         $query = "SELECT name FROM user WHERE name='$_POST[myUser]' AND password='$_POST[myPassword]'";
         //echo '<em> ' . $query . ' </em>';
         $result = mysql_query($query);
         if (mysql_numrows($result) == 1) {
		      session_start();
		      $_SESSION['session_user']=$_POST[myUser];
			  header('Location: index.php');
		 }
		 else {
			  header('Location: login.html');
		 }
		
?>