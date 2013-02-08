<!-- Detta ska stå i början av html sidan -->
<?php
include '../File/connect.php';
?>

<!-- Detta här ska stå när du inte längre vill använda databasen.-->
<?php
   mysql_close($con);
?>