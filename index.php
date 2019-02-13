<?php 
setcookie('project','',time()-36000);
session_start(); 
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
	<title>project</title>
    <?php 
    
    if(isset($_COOKIE['project']) ){
        
     $_SESSION['username']=$_COOKIE['project'];
    }
          
 ?>
    <link rel="stylesheet" type="text/css" href="css/english.css"/>
<script src="js/jquery.js"></script>
	
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body background="gra/bg.jpg"> 

<div   id="wrapp">
<div id="logo"> <img  src="gra/proj.gif"/> </div>
<div id="clock"><?php include("js/clock.htm");?></div>

<div id="search">
<form action="view/search.php" method="POST">
<input type="text" id="search1" name="sea"/>
<input type="submit" name="search" id="search2" value=" "/>
</form>
</div>


<div id="navbar">
<ul  id="bar"> 
<li ><a href="index.php">الرئيسية</a></li>
<li ><a href="view/allnews.php">اخر الاخبار</a></li>
<li ><a href="view/sport.php">رياضة</a></li>
<li ><a href="view/politcs.php">سياسة</a></li>
<li ><a href="view/education.php">تعليم</a></li>
<li ><a href="view/accidents.php">الحوادث</a></li>
<li ><a href="view/healthy.php">صحة</a></li>
<li ><a href="view/economy.php">اقتصاد</a></li>
<li ><a href="">call us</a></li>

</ul>
</div>	










<div id="left">	<?php include("show.php"); ?></div>
<div id="right">
<?php 
if(isset($_GET['id'])){


$id=$_GET['id'];  
}
?>
<?php 

if (!isset($_SESSION['username']))
{
    ?>
<form action="member/login_p.php?page=<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
<br /><br />
username:
<input id="inp" type="text" name="username" />
password:
<input id="inp" type="password" name="password"/><br />
<input type="checkbox" id="checkbox" name="remeber" value="1"/>remeber me<br />
<input  type="submit" name="signin" value="sign in" id="signin"/>
</form>
<br /> 

<?php 
 if(isset($_POST['regist'])){
    
   ?>
<meta http-equiv="refresh" content="0;url=member/register.php"/>
<?php
} 
//<?php echo $PHP_SELF; 
?>
<form action="member/register.php" method="POST">
<input type="submit" name="regist" value="Sign up" id="regreg"/>
</form>
<?php } else{
   ?><div id='sout'><?php
    print "hi,".$_SESSION['username'];
    if($_SESSION['username']=="admin")
    {
       print("<br><a  href='admin/cpanel.php'>control panel <a/>");
    }
 ?>   
<form action="member/signout.php" method="POST">
<input type="submit" name="signout" value="sign out" id="signout"/>
</form></div></div>
<?php }


 ?></div>
		


</body>
</html>