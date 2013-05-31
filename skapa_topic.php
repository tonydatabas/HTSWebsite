<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Skapa tråd</title>


<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://localhost/databas/tabell.css" />
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
//skapa_topic.php
include 'connect.php';

echo '<h2>Skapa tråd</h2>';
if($_SESSION['signed_in'] == false)
{
	//användaren är inte inloggad
	echo 'Ledsen, du måste <a href="loggain.php">logga in</a> för att skapa tråd.';
}
else
{
	//användaren är inloggad
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{	
	
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			//felmeddelande
			echo 'Ett fel inträffade. Försök igen senare.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				//inga kategorier
				if($_SESSION['user_level'] == 1)
				{
					echo 'Inga kategorier har skapats';
				}
				else
				{
					echo 'Innan du postar en tråd, måste en admin skapa kategorier';
				}
			}
			else
			{
		
				echo '<form method="post" action="">
					Ämne: <input type="text" name="topic_subject" /><br />
					Kategori:'; 
				
				echo '<select name="topic_cat">';
					while($row = mysql_fetch_assoc($result))
					{
						echo '<option value="' . $row['cat_id'] . '">' . htmlentities($row['cat_name']) . '</option>';
					}
				echo '</select><br />';	
					
				echo 'Meddelande: <br /><textarea name="post_content" /></textarea><br /><br />
					<input type="submit" value="Skapa tråd" />
				 </form>';
			}
		}
	}
	else
	{
		//starta överföringen
		$query  = "BEGIN WORK;";
		$result = mysql_query($query);
		
		if(!$result)
		{
			//query failades, avslutas därmed
			echo 'Ett fel inträffade när tråden skapdes, försök igen senare';
		}
		else
		{
	
			//spara uppgifterna
			//lägg in tråd data i topic tabellen, därefter svars data i post tabellen
			$sql = "INSERT INTO 
						topics(topic_subject,
							   topic_date,
							   topic_cat,
							   topic_by)
				   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
							   NOW(),
							   " . mysql_real_escape_string($_POST['topic_cat']) . ",
							   " . $_SESSION['user_id'] . "
							   )";
					 
			$result = mysql_query($sql);
			if(!$result)
			{
				//Ett fel inträffade
				echo 'Ett fel inträffade när data skulle läggas in. Försök igen senare.<br /><br />' . mysql_error();
				$sql = "ROLLBACK;";
				$result = mysql_query($sql);
			}
			else
			{
				//nu post tabellen
			
				$topicid = mysql_insert_id();
				
				$sql = "INSERT INTO
							posts(post_content,
								  post_date,
								  post_topic,
								  post_by)
						VALUES
							('" . mysql_real_escape_string($_POST['post_content']) . "',
								  NOW(),
								  " . $topicid . ",
								  " . $_SESSION['user_id'] . "
							)";
				$result = mysql_query($sql);
				
				if(!$result)
				{
					//Ett fel inträffade
					echo 'Ett fel inträffade när data skulle läggas in. Försök igen senare.<br /><br />' . mysql_error();
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					
					//nu funkar allt
					echo 'Du har skapat <a href="topic.php?id='. $topicid . '">din tråd</a>.<br>';
				}
			}
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


