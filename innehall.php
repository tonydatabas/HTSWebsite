<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Senaste</title>


<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/tabell.css" />
<link rel="shortcut icon" href="http://localhost/databas/favicon.ico" />
<style>
.navbar {
      overflow: hidden
    }
	.searchform {
	display: inline-block;
	zoom: 1; /* ie7 hack for display:inline-block */
	*display: inline;
	border: solid 1px #d2d2d2;
	padding: 3px 5px;
	
	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	box-shadow: 0 1px 0px rgba(0,0,0,.1);

	background: #f1f1f1;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
	background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie8 */
}   

.searchform input {
	font: normal 12px/100% Arial, Helvetica, sans-serif;
}
.searchform .searchfield {
	background: #fff;
	padding: 6px 6px 6px 8px;
	width: 202px;
	border: solid 1px #bcbbbb;
	outline: none;

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 27px;
	width: 27px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#9e9e9e), to(#454545));
	background: -moz-linear-gradient(top,  #9e9e9e,  #454545);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}
  </style>


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
			<li class="current_page_item"><a href="nyhet.php">Senaste</a></li>
			<li class="page_item page-item-2"><a href="loggain.php">Logga in</a></li>
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
		<br>
<?php
//innehall.php
include 'connect.php';

$sql = "SELECT*from nyhet where nyhet_id = " . mysql_real_escape_string($_GET['id']) ;

$result = mysql_query($sql);


if(!$result)
{
	echo 'Kunde inte visas. Försök igen senare' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'Existerar inte';
	}
	else
	{
		
		while($row = mysql_fetch_assoc($result))
		{
			echo '<h2>' . htmlentities($row['nyhet_rubrik']) . '</h2>';
			echo '' . htmlentities($row['nyhet_content']) . '';
			echo '</br>';
		
		}
	

	}
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


</div>
</div>


</body>
</html>

