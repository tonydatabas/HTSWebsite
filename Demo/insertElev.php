<?php
include '../Demo/connect.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv" lang="sv">    
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=utf-8" />
        <link rel="stylesheet" title="magnum" type="text/css" href="../CSS/magnum.css" />
		<link rel="alternate stylesheet" title="none" type="text/css" href="../CSS/empty.css.css" />	  
        <title>Skriv namnet på sidan här!</title>	
    </head>
	<body>
<?php
         $query = "INSERT INTO `demo`.`elever` (`id`, `klass`) VALUES (NULL, '$_POST[myClass]')";
         echo '<em> ' . $query . ' </em>';
         $result = mysql_query($query);
         if ($result === false) {
	         echo '<strong> Error when tring to add data to database. ' . mysql_errno . ' : <br />' . mysql_error . '</strong>';
        }
?>
<h1>hej</h1>
</body>
</html>