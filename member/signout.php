<?php
setcookie('project','',time()-36000);
session_start();

unset($_SESSION['username']);
header("location:../index.php");

?>