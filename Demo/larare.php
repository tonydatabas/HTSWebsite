<?php
include '../Demo/connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv" lang="sv">    
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=utf-8" />
        <link rel="stylesheet" title="magnum" type="text/css" href="../CSS/test.css" />
		<link rel="alternate stylesheet" title="none" type="text/css" href="../CSS/empty.css.css" />	  
        <title>Skriv namnet på sidan här!</title>	
    </head>
    <body>
        <div id="content">
            <div id="top">
               <div id="banner-left" >Här ska HTS-logga vara</div>
               <div id="banner-center" ><h1>LEK för vår skola</h1></div>
               <div id="banner-right" ><h1>LEK</h1></div>
            </div>
            <div id="left">
					<div class="dokument-item">
						Nyheter!
					</div>
            </div>
            <div id="center-right">
                <div id="info">
				<h1 class="dokument-item-header"> Lärare i skolan</h1>
				<p class="info">En lista över lärare i skolan</p>
				
				<?php
         $query = "SELECT personer.namn, personer.alder, larare.legitimation FROM `larare`, `personer` WHERE larare.id=personer.altid";
         //echo '<em> ' . $query . ' </em>';
         $result = mysql_query($query);
         if ($result === false) {
	         echo '<strong> Error when you asked a question to your databas. ' . mysql_errno . ' : <br />' . mysql_error . '</strong>';
        }

         $num=mysql_numrows($result);
         if($num==0) {
             echo '<strong>Your question is empty</strong>';
         }
         else {
             echo "<ul>";
             for ($i=0;$i<$num;$i++) {
                 $temp = mysql_fetch_array($result);
	             echo "<li>" . $temp["namn"] . " : ". $temp["legitimation"] . " : ". $temp["alder"] . "</li>";
             }
             echo "</ul>";
        }
?>
				
</div>
</div>
			<div id="footer">
				<p> &copy; 2013 Ditt namn här. Detta är en fotnot# 
				</p>
			</div>
        </div>
    </body>
</html>
<?php
   mysql_close($con);
?>