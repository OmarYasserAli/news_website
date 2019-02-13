<?php session_start(); 
?>
<!DOCTYPE HTML>

<html>
<style type="text/css">
    #view{
        background: #fff;
        margin-top: 25px;
        height: auto;    
    }
    #sp{
        height: 2px;
    }
    #title{
        
        color: red;
        direction: rtl;
        margin-right: 25px;
        margin-left: 25px;  
              
    }
    #date{
        
        direction: rtl;
        margin-top: -15px;
        margin-right: 45px;
        margin-bottom: 30px;
    }
    #news{
        direction: rtl;
        margin-right: 25px;
        margin-left: 25px;  
        margin-bottom: 20px;
        
    }
    textarea{
        
        border: 3px solid #000;
        border-radius: 10px;
    }
    #addcomm{
        width: 60px;
        height: 28px;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background: #0057AE;
        margin-left: 125px;
        margin-top: -30px;
    }
    #date2{
        background: #000;
        color: #fff;
        margin-bottom: -22px;
        direction: rtl;
    }
    #coment{
        border: 1px solid #000;
        background: #fff;
        height: auto;
        margin-top: 40px;
        margin-bottom: 30px;
        
    }
    #comm{
        
        background: #fff;
        direction: rtl;
        
    }
    #log{
        font-weight: bold;
        font-size: 25px;
        color:white;
        background: #A80000;
        margin-bottom: 30px;
        text-decoration:none;
        padding: 10px 30px 10px 30px;
        
    }
</style>
	<script language="javascript" type="text/javascript">
    var max =300; 
    function dis (text,count){
        if(text.value.length>max){
            text.value=text.value.substring(0,max);
        }
        else{count.value=max-text.value.length;}
        
        
    }
    
    </script>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
	<title>news</title>
    <?php
    if(isset($_COOKIE['project']) ){
        
        
       $_SESSION['username']=$_COOKIE['project'];
    }
  

 ?>
 <script src="js/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="../css/english.css"/>	
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
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
<?php
$id=$_GET['id'];
$conect=mysqli_connect('localhost','root','',"geng");
$sel="select * from threads where id='$id'";
$sel2="select * from comment where thread_id='$id' order by id desc";
$query=mysqli_query($conect,$sel);
$query2=mysqli_query($conect,$sel2);
$row=mysqli_fetch_object($query);

?>
<div id="view">
<div id="sp"></div>
<div id="title"><h1><?php print stripslashes($row->title); ?></h1>

</div>
<div id="date"><?php    print $row->date;    ?></div>
<div id="pic"><center><img src="../image.php?id= <?php echo $row->id; ?>" width="630" height="530"/></center></div>

<div id="news"><h2><?php print stripslashes($row->topic); ?><br /></h2>

<h4 dir="rtl"> عدد مرات المشاهدة : <?php  $view=$row->view; 
 $view++;
 print $view;
$update="update threads set view='$view' where id='$id'";
$que=mysqli_query($conect,$update);
?>
<br /></h4>
</div>

</div>
<?php while ($com=mysqli_fetch_object($query2)){ ?>
<div id="coment">

<div id="date2"><?php echo $com->date; 

?></div>
<div id="comm"><h3><?php print  $com->username; ?>
<br /><br /><center><?php print $com->comment;?></center><br /></h3></div>
</div>
<?php 
}
if(isset($_SESSION['username'])){
    ?>
    <h2 align='center'>شارك بتعليقك</h2>  
    <form action="<?php echo $_SERVER['PHP_SELF'] ?> ?id=<?php print $row->id; ?>" method="POST">
  <center>  <textarea rows="6" cols="100" name="comment" onkeydown="dis(this.form.comment,this.form.counter)" 
  onkeyup="dis(form.comment,form.counter)"> </textarea>
  
  </center>
  <input type="submit" name="add" value="replay" id="addcomm"/>
  <input readonly type="text" value="300" name="counter"/>متيقى
  </form>
    <?php    
}
else{
        ?>
        
        <center>
        
        <a href="../member/login.php?page=<?php echo $_SERVER['REQUEST_URI']; ?>" id="log">سجل دخولك وشاركنا بتعليقك</a>
        
    </center>
        
        <?php
        
        
    }
if(isset($_POST['add'])){
    $comment=$_POST['comment'];
    $date=date("d/m/Y h:m");
    $username=$_SESSION['username'];
    
    if(!empty($comment)){
        
        $ins="insert into comment (comment,username,date,thread_id) values ('$comment','$username','$date','$id')";
        $query3=mysqli_query($conect,$ins);
        ?> 
        <meta http-equiv="refresh" content="0;url=news.php?id=<?php print $row->id; ?>"/>
        <?php
        
    }
    
}

?>

</div>
<br /><br />