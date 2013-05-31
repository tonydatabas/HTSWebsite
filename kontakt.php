<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Kontakt</title>



<link rel="shortcut icon" href="http://localhost/databas/favicon.ico" />
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
<table>
<tr>
<td><strong>Kontakt formulär </strong></td>
</tr>
</table>

<table >
<tr>
<td><form name="form1" method="post" action="skicka.php">
<table>
<tr>
<td>Namn</td>
<td>:</td>
<td><input name="namn" type="text" id="namn" size="40"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input name="besokare_mail" type="text" id="besokare_mail" size="40"></td>
</tr>
<tr>
<td width="16%">Ämne</td>
<td width="2%">:</td>
<td width="82%"><input name="subject" type="text" id="subject" size="40"></td>
</tr>
<tr>
<td>Beskrivning:</td>
<td>:</td>
<td><textarea name="beskrivning" cols="50" rows="4" id="beskrivning"></textarea></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Skicka"> <input type="reset" name="Submit2" value="Rensa"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>


             
        </div>
    </div>
   
    



</div>
</div>


</body>
</html>
