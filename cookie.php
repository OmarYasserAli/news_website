<?php 
session_start();
 setcookie("project",$_SESSION['username'],time()+3600);


?>
<center><h2>hello <?php print $_SESSION['username']; ?></h2></center>
<meta http-equiv="refresh" content="3;url=index.php"/>
