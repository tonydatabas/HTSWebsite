<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Kategori</title>


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
            <li class="page_item page-item-2"><a href="index.php">Hem</a></li>
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
		<br>
<?php
//kategori.php
include 'connect.php';


//selecta kategorin,baserad på $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
	echo 'Kategorin kunde inte visas. Försök igen senare' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'Kategorin existerar inte';
	}
	else
	{
		//kategori data
		while($row = mysql_fetch_assoc($result))
		{
			echo '<h2>Trådar i &prime;' . htmlentities($row['cat_name']) . '&prime;</h2>';
			echo 'Skapa <a href="skapa_topic.php"> tråd</a>';
			echo '</br>';
		
		}
	
		//query för tabellen
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'Trådarna kunde inte visas. Försök igen senare';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'Det finns inga trådar i kategorin.';
			}
			else
			{
				//tabellen
				echo '<table border="1">
					  <tr>
						<th>Trådar</th>
						<th>Skapad den</th>
					  </tr>';	
					
				while($row = mysql_fetch_assoc($result))
				{				
					echo '<tr>';
						echo '<td class="leftpart">';
							echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br /><h3>';
						echo '</td>';
						echo '<td class="rightpart">';
							echo date('d-m-Y', strtotime($row['topic_date']));
						echo '</td>';
					echo '</tr>';
				}
			}
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

