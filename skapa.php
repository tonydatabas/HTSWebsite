<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Skapa konto</title>


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
			<li class="current_page_item"><a href="skapa.php">Skapa konto!</a></li>
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
//skapa.php
include 'connect.php';


echo '<h4>Bli medlem!</h4>';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
 
}
else
{
    
	$errors = array(); /* deklarera array */
	
	if(isset($_POST['user_name']))
	{
		/*användarnamn*/
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'Användarnamnet kan bara innehålla bokstäver och nummer.';
		}
		if(strlen($_POST['user_name']) > 20)
		{
			$errors[] = 'Användarnamnet kan inte innehålla mer än 20 tecken.';
		}
		if(empty($_POST['user_name']))
		{
			$errors[] = 'Användarnamnet är tomt';
		}
	}
	
	
	/*lösenord*/
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = 'Lösenordet stämde inte.';
		}
		if(empty($_POST['user_pass']) )
		{
			$errors[] = 'Lösenord är tomt';
		}
	}
	
	if(isset($_POST['user_email']))
	{
		//email
		$regex = "/^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$/i";
         if(!preg_match($regex,$_POST['user_email']))
		{
			$errors[] = 'Email inte korrekt';
		}
		
	}
	else
	{
		$errors[] = 'Email tomt.';
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

		$sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . mysql_real_escape_string($_POST['user_name']) . "',
					   '" . sha1($_POST['user_pass']) . "',
					   '" . mysql_real_escape_string($_POST['user_email']) . "',
						NOW(),
						0)";
						
		$result = mysql_query($sql);
		if(!$result)
		{
			
			//ett fel har inträffat
			echo 'Ett fel inträffade. Försök igen senare';
		
		}
		else
		{
			echo 'Registreringen lyckades!. Du kan <a href="loggain.php">logga in</a>';
		}
	}
}


?>
<form method="post" action="">
 	 	Användarnamn: <input type="text" name="user_name" /><br />
 		Lösenord: <input type="password" name="user_pass"><br />
		Lösenord igen: <input type="password" name="user_pass_check"><br />
		E-mail: <input type="email" name="user_email"><br />
 		<input type="submit" value="Bli medlem!" />
 	 </form>
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