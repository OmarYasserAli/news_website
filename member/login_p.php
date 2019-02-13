<?php
session_start();
if(isset($_SESSION['username'])){
    
    header("location:../index.php");
}
else{
    
$username=$_POST['username'];
$password=$_POST['password'];

$remember=0;
if (isset($_POST['remeber']))
$remember=$_POST['remeber'];
$page=$_GET['page'];
$password=md5($password);
$connect=mysqli_connect('localhost','root','','geng');
$select="select * from users where username='$username' and password='$password'";
$query=mysqli_query($connect,$select);
$num=mysqli_num_rows($query);
while($id=mysqli_fetch_array($query)){
    $memid[]=$id['id'];
    
}


if($num>0){
    
    
    $_SESSION['username']=$username;
   
    if($remember==1){
        setcookie("project",$_SESSION['username'],time()+3600);
      //header("location:../cookie.php");
        
    }
    else{
        ?>
        
<meta http-equiv="refresh" content="3;url=<?php print  $page ?>.php"/>
        <?php

    }
    ?>
    <center><h2>hello <?php print $_SESSION['username']; ?></h2></center>
    <meta http-equiv="refresh" content="3;url=<?php print  $page; ?>"/>
    <?php
    
}else{
    ?>
    <center><h1> invaild  username or password.<a href='<?php print $page;?>'>back</a> </h1> </center>
    <?php
}}
?>