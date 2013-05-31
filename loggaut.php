<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Logga ut</title>


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
			<li class="page_item page-item-2"><a href="skapa.php">Forum</a></li>
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
//loggaut.php
include 'connect.php';


echo '<h2>Utloggning</h2>';

//kolla om användaren är inloggad
if($_SESSION['signed_in'] == true)
{
	//unseta alla variabler
	$_SESSION['signed_in'] = NULL;
	$_SESSION['user_name'] = NULL;
	$_SESSION['user_id']   = NULL;

	echo 'Utloggning lyckades, tack för att du besökte sidan.<br>';
}
else
{
	echo 'Du är inte inloggad. Vill du <a href="loggain.php">logga in?</a><br>';
}


?>

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
