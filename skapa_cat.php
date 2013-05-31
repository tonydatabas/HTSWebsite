<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Skapa kategori</title>
</head>
<body>
<?php
//skapa_cat.php
include 'connect.php';

//notebart är att bara admin kan skapa kategorier!!!!
echo '<h2>Skapa kategori</h2>';
if($_SESSION['signed_in'] == false | $_SESSION['user_level'] != 1 )
{
	//användaren är inte admin, måste ha user level 1
	echo 'Ledsen du är inte admin.';
}
else
{
	//användaren är admin
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		
		echo '<form method="post" action="">
			Kategori namn: <input type="text" name="cat_name" /><br />
			Kategori beskrivning:<br /> <textarea name="cat_description" /></textarea><br /><br />
			<input type="submit" value="Skapa kategori" />
		 </form>';
	}
	else
	{
		//spara i tabellen kategori
		$sql = "INSERT INTO categories(cat_name, cat_description)
		   VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
				 '" . mysql_real_escape_string($_POST['cat_description']) . "')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//ett fel inträffade
			echo 'Fel' . mysql_error();
		}
		else
		{
			echo 'Ny kategori lades till.';
		}
	}
}

?>
</body>
</html>