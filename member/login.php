<?php session_start(); 
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
	<title>project</title>
    <?php
    if(isset($_COOKIE['project']) ){
        
        
       // $_SESSION['username']=$_COOKIE['project'];
    }
    include("../lang/english.php");
    ?>
     <link rel="stylesheet" type="text/css" href="../css/english.css"/>
     
    

<script src="js/jquery.js"></script>




	
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
 <style type="text/css"> 
    #reg{
        margin-top: 70px;
        font-size: 28px;
        
        border-radius: 7px;
    }
    #inp{
        
       border-radius: 7px; 
        height: 35px;
        width: 170px;
    }
    #register{
        color: #fff;
        height: 40px;
        width: 120px;
        background:   #0000DF;
        font-size: 16px;
        border: 0px solid #000;
        border-radius: 7px;  
        margin-top: 20px;   
        margin-left: 95px;   
    }
    #register:hover{
        
        background:  #4848FF;
    }
    </style>



</head>

<body background="../gra/bg.jpg"> 

<div   id="wrapp">
<div id="logo"> <img  src="../gra/proj.gif"/> </div>
<div id="clock"><?php include("../js/clock.htm");?></div>
<div id="search">
<form action="../view/search.php" method="POST">
<input type="text" id="search1"/>
<input type="submit" name="search" id="search2" value=" "/>
</form>
</div>
<div id="navbar">
<ul  id="bar"> 
<li ><a href="../index.php">الرئيسية</a></li>
<li ><a href="../view/allnews.php">اخر الاخبار</a></li>
<li ><a href="../view/sport.php">رياضة</a></li>
<li ><a href="../view/politcs.php">سياسة</a></li>
<li ><a href="../view/education.php">تعليم</a></li>
<li ><a href="../view/accidents.php">الحوادث</a></li>
<li ><a href="../view/healthy.php">صحة</a></li>
<li ><a href="../view/economy.php">اقتصاد</a></li>
<li ><a href="">call us</a></li>

</ul>
</div>	
<center>
<?php $page=$_GET['page']; ?>
<form action="login_p.php?page=<?php echo $page; ?>" method="POST" id="reg" />

<table>
<tr>  <td>username</td>       <td><input type="text" name="username" id="inp"/></td>  </tr>

<tr>  <td>Password</td>       <td><input type="password" name="password" id="inp"/></td>  </tr>

</table>
<input type="checkbox" name="remeber"/>remeber me<br />
<input type="submit" name="register" value="login" id="register"/>
<a href="register.php"><h4>التسحيل</h4></a>
</form>

</center>



</div>
		


</body>
</html>