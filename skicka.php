<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Skicka</title>



<link rel="shortcut icon" href="http://localhost/skola/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/tabell.css" />

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
                            <div class="grid_12 omega">
                                <div class="contactinfo"><form class="searchform" action="search.php" method="post">
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
			<li class="page_item page-item-2"><a href="forum.php">Forum</a></li>
						<li class="page_item page-item-2"><a href="medlemmarna.php">Medlemmarna</a></li>
						<li class="current_page_item"><a href="kontakt.php">Kontakt</a></li>
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
//skicka.php
echo '<h4>Kontakt</h4>';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{

   
}
else
{

	$errors = array(); /* array för fel*/
	
	if(isset($_POST['namn']))
	{
	if(empty($_POST['namn']) )
		{
			$errors[] = 'Namnet är tomt';
		}
		/*namn*/
		if(!ctype_alnum($_POST['namn']))
		{
			$errors[] = 'Namnet kan bara innehålla bokstäver och nummer.';
		}
		if(strlen($_POST['namn']) > 20)
		{
			$errors[] = 'Namnet kan inte innehålla mer än 20 tecken.';
		}
		
	}
	else
	{
		$errors[] = 'Namnet är tomt.';
	}


    if(isset($_POST['besokare_mail']))
	{
		//email
		$regex = "/^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$/i";
         if(!preg_match($regex,$_POST['besokare_mail']))
		{
			$errors[] = 'Email inte korrekt';
		}
		if(strlen($_POST['besokare_mail']) > 20)
		{
			$errors[] = 'Kan inte innehålla mer än 20 tecken';
		}
	}
	else
	{
		$errors[] = 'Email tomt.';
	}
	
	if(isset($_POST['subject']))
	{
		/*ämne*/
		
		if(empty($_POST['subject']) )
		{
			$errors[] = 'Subject är tomt';
		}
			if(strlen($_POST['subject']) >20 )
		{
			$errors[] = 'Subject är för långt';
		}
	}

	if(isset($_POST['beskrivning']))
	{
		/*beskrivning*/
		
		if(empty($_POST['beskrivning']) )
		{
			$errors[] = 'Beskrivning är tomt';
		}
		
	}
	
	if(!empty($errors)) 
	{
		echo 'Vissa saker fylldes inte i korrekt<br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value) /* loop genom array för att kolla fel */
		{
			echo '<li>' . $value . '</li>'; /* fel lista */
		}
		echo '</ul>';
	}
	else
	{
		
$subject= $_POST['subject'];
$namn= $_POST['namn'];
$meddelande= $_POST['beskrivning'];

// Mail från sändaren
$mail_from=$_POST['besokare_mail'];

// Meddelandet
$message="".$meddelande."";



// Från
$header="from: $namn <".$mail_from.">";


// Ägarens email
$to ='';

$send_contact=mail($to,$subject,$message,$header);
		
						
		if($send_contact){
echo "Tack för ditt email";
}
else {
echo "Det inträffade ett fel, försök igen senare";
}
	}
}


?>


             
        </div>
    </div>
   
    



</div>
</div>


</body>
</html>

