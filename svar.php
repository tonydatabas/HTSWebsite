<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Svar</title>


<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/style.css" />
<link rel="shortcut icon" href="http://localhost/databas/favicon.ico" />
<link rel="stylesheet" href="http://localhost/databas/sok.css">


<style type="text/css" media="screen">
	html { margin-top: 28px !important; }
	* html body { margin-top: 28px !important; }
</style>
</head>
    <body>
        <div class="wrapper">
            <div class="body_wrapper">
                <div class="topmain_wrapper">
                 
                </div>
                <div class="container_24">
                    <div class="grid_24">
                        <div class="header" id="#top">
                            <div class="grid_12 alpha">
                                <div class="logo"><a href="http://localhost/databas/"><img src="http://localhost/databas/images/logo.png" alt="skola" /></a></div>
                            </div>
                            <div class="grid_12 omega">      <div class="contactinfo"><form class="searchform" action="search.php" method="post">
	<input class="searchfield" type="text" name="sokanvandare"  value="Sök..." onfocus="if (this.value == 'Sök...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sök...';}" />
	<input class="searchbutton" type="submit" name="submit" value="Sök" />
</form>
                                                                            
                                                                    </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="wrapper_menu">
                            <div class="menu_container">
                                <div class="menu_bar">
                                    <div id="MainNav"> 
                                            <div id="menu">
        <ul class="ddsmoothmenu">
            <li class="page_item page-item-2"><a href="http://localhost/databas/">Hem</a></li>
			<li class="page_item page-item-2"><a href="nyhet.php">Senaste</a></li>
			<li class="page_item page-item-2"><a href="loggain.php">Logga in</a></li>
			<li class="page_item page-item-2"><a href="skapa.php">Skapa konto!</a></li>
			<li class="current_page_item"><a href="forum.php">Forum</a></li>
						<li class="page_item page-item-2"><a href="medlemmarna.php">Medlemmarna</a></li>
						<li class="page_item page-item-2"><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>  


    <div>
        <!-- Innehåll -->
<?php
//svar.php
include 'connect.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//någon försöker komma åt filen direkt
	echo '<br>Du kan inte komma åt filen<br>';
}
else
{
	//kolla om personen är inloggad
	if(!$_SESSION['signed_in'])
	{
		echo 'Du måste vara inloggad för att svara';
	}
	else
	{
		
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						" . mysql_real_escape_string($_GET['id']) . ",
						" . $_SESSION['user_id'] . ")";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			echo 'Ditt svar har inte sparats, försök igen senare';
		}
		else
		{
			echo '<br>Ditt svar har sparats, kolla på <a href="topic.php?id=' . htmlentities($_GET['id']) . '">tråden</a>.<br>';
		}
	}
}


?>

	<br>
    				
</div>

</div>
</div>



</div>
</div>


</body>
</html>