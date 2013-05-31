<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Logga in</title>


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
			<li class="current_page_item"><a href="loggain.php">Logga in</a></li>
			<li class="page_item page-item-2"><a href="skapa.php">Skapa konto!</a></li>
			<li class="page_item page-item-2"><a href="forum.php">Forum</a></li>
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
//loggain.php
include 'connect.php';


echo '<h3>Logga in</h3><br />';

//kolla om personen är inloggad
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'Du är redan inloggad, du kan <a href="loggaut.php">logga ut</a> om du vill.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		
		echo '<form method="post" action="">
			Användarnamn: <input type="text" name="user_name" /><br />
			Lösenord: <input type="password" name="user_pass"><br />
			<input type="submit" value="Logga in" />
		 </form>';
	}
	else
	{
		/* kolla alla fel som kan uppstå
		*/
		$errors = array(); /* array för felmeddelande */
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'Användarnamn tomt.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'Lösenord är tomt.';
		}
		
		if(!empty($errors)) 
		{
			echo 'Vissa saker fylldes inte i korrekt<br /><br />';
			echo '<ul>';
			foreach($errors as $key => $value) 
			{
				echo '<li>' . $value . '</li>'; 
			}
			echo '</ul>';
		}
		else
		{
			//inga fel har uppstått
			//mysql_real_escape_string, skyddar mot attacker
			//sha1, kryptering
			$sql = "SELECT 
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						user_pass = '" . sha1($_POST['user_pass']) . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				
				echo 'Ett fel inträffade. Försök igen senare';
				
			}
			else
			{
				//query lyckades, 2 möjligheter
				//1. användaren kan logga in
				//2. fel uppgifter
				if(mysql_num_rows($result) == 0)
				{
					echo 'Fel lösenord/användarnamn. Försök igen senare.';
				}
				else
				{
					
					$_SESSION['signed_in'] = true;
					
					//vi lägger in user_id och user_name i session så den kan användas på andra sidor, tex på forumet.
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['user_id'] 	= $row['user_id'];
						$_SESSION['user_name'] 	= $row['user_name'];
						$_SESSION['user_level'] = $row['user_level'];
					}
					
					echo 'Välkommen, ' . $_SESSION['user_name'] . '. <br />';
					
				}
			}
		}
	}
}


?>

	<br>
	<br>
    <div class="grid_8 omega">
        <div class="signinwidgetarea">
                        <div class="signinformbox1">
                <div class="signupForm">
                 
                </div>
            </div>
        </div>	
    </div>					
</div>

</div>
</div>
<div class="clear"></div>
<!--Start Footer-->
<div class="footer-wrapper">
    <div class="footer">
        <div class="container_24">
            <div class="grid_24">
                <div class="grid_6 alpha">
   
</div>
<div class="grid_6">
    <div class="footer_widget second">
         
            <h4>Databas</h4>
        
    </div>
</div>



            </div>
            <div class="clear"></div>
        </div>
        <div class="footersep"></div>
        <div class="clear"></div>
        <div class="footer-bottom-wrapper">
            <div class="footer-bottom">
                
            </div>
        </div>
    </div>
</div>
</div>
</div>


</body>
</html>