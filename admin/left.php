<?php
session_start();
if($_SESSION['username']!="admin"){
    header("location:../index.php");
    
}
?>
