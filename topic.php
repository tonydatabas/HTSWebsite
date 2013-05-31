<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Tråd</title>



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
        <div id="fragment-1"  style=""> 
		<br>
<?php

include 'connect.php';


$sql = "SELECT
			topic_id,
			topic_subject
		FROM
			topics
		WHERE
			topics.topic_id = " . mysql_real_escape_string($_GET['id']);
			
$result = mysql_query($sql);

if(!$result)
{
	echo 'Tråden kunde inte visas, försök igen senare.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'Tråden existerar inte.';
		
	}
	else
	{
		while($row = mysql_fetch_assoc($result))
		{
			//visa data
			echo '<table class="topic" border="1">
					<tr>
						<th colspan="2">Trådnamn: ' . $row['topic_subject'] . '</th>
					</tr>';
		
			
			$posts_sql = "SELECT
						posts.post_topic,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						users.user_id,
						users.user_name
					FROM
						posts
					LEFT JOIN
						users
					ON
						posts.post_by = users.user_id
					WHERE
						posts.post_topic = " . mysql_real_escape_string($_GET['id']);
						
			$posts_result = mysql_query($posts_sql);
			
			if(!$posts_result)
			{
				echo '<tr><td>Svaren kunde inte visas. Försök igen senare</tr></td></table>';
			}
			else
			{
			
				while($posts_row = mysql_fetch_assoc($posts_result))
				{
					
						  echo "<table width='100%'><tr><td valign='top' style='border: 1px solid #000000;'><div style='min-height: 1px;'><br />Skapad av ". $posts_row['user_name'] ." - " . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . "<tr><td colspan='2' style='border: 1px solid #000000;'><hr />" . (stripslashes($posts_row['post_content'])) . "</td></tr></div></tr></table>";
				}
			}
			
			if(!$_SESSION['signed_in'])
			{
				echo '<tr><td colspan=2>Du måste vara <a href="loggain.php">inloggad</a> för att svara. Du kan även <a href="skapa.php">skapa</a> ett konto.';
			}
			else
			{
				//svarsruta
				echo '<tr><td colspan="2"><h2>Svar:</h2><br />
					<form method="post" action="svar.php?id=' . $row['topic_id'] . '">
						<textarea name="reply-content"></textarea><br /><br />
						<input type="submit" value="Svara" />
					</form></td></tr>';
			}
			
			//avsluta tabell
			echo '</table>';
		}
	}
}


?>
<br>
<br>
</div>
</div>


</body>
</html>
