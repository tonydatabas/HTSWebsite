<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Vietnam-Forum</title>

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
		<form id="searchbox" action="searchpost.php" method="post">
    <input id="search" type="text" name="sokpost" value="Sök på kommentarer..." onfocus="if (this.value == 'Sök på kommentarer...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sök på kommentarer...';}">
    <input id="submit" type="submit" name="submit" value="Search">
</form>  
                          
<?php

include 'connect.php';


$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id";

$result = mysql_query($sql);

if(!$result)
{
	echo 'Inga kategorier kunde visas, försök igen senare.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'Inga kategorier har skapats';
	}
	else
	{
		//tabellen
		echo '<table border="1">
			  <tr>
				<th>Kategori</th>
				<th>Senaste tråd</th>
			  </tr>';	
			
		while($row = mysql_fetch_assoc($result))
		{				
		
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<h3><a href="kategori.php?id=' . $row['cat_id'] . '">' . htmlentities ($row['cat_name']) . '</a></h3>' . htmlentities ($row['cat_description']);
				echo '</td>';
				echo '<td class="rightpart">';
				
				//senaste tråden för varje kategori
					$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . $row['cat_id'] . "
								ORDER BY
									topic_date
								DESC
								LIMIT
									1";
								
					$topicsresult = mysql_query($topicsql);
				
					if(!$topicsresult)
					{
						echo 'Senaste tråden kunde inte visas';
					}
					else
					{
						if(mysql_num_rows($topicsresult) == 0)
						{
							echo 'Inga trådar';
						}
						else
						{
							while($topicrow = mysql_fetch_assoc($topicsresult))
							
							echo '<a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> den ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						}
					}
				echo '</td>';
			echo '</tr>';
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