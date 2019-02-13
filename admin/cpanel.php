<?php 
session_start();
if($_SESSION['username']!="admin"){
    
    header("location:../index.php");
    
}

?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    
    
    
    
   <frameset cols="50%,15%">

<frame src="left.php" name="left">
<frame src="right.php" name="right">

</frameset>
    
    
    </head>
    </html>