<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['rpassword'];
$email=$_POST['email'];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    
    print"<center><h2> invaild E-mail <a href='register.php'>back </a></h2></center>";
    exit;
}
if($password!=$password2  or empty($password)){
    print"<center><h2> uncorrect Password <a href='register.php'>back </a></h2></center>";
    exit;  
}

if(empty($username)){
    print"<center><h2> enter a username <a href='register.php'>back </a></h2></center>";
    exit;   
}


if($_POST['register'])
{

$connect=mysqli_connect('localhost','root','','geng');
$select1="select * from users where username='$username'";
$query1=mysqli_query($connect,$select1);
$num1=mysqli_num_rows($query1);
if($num1>0){
     ?> 
    <center><h2>this username is already used <a href="register.php">try anther one</a></h2></center><h2></h2>
    <?php
    exit;
    }


$select2="select * from users where email='$email'";
$query2=mysqli_query($connect,$select2);
$num2=mysqli_num_rows($query2);
if($num2>0){
     ?> 
    <center><h2>this E-mail is already used <a href="register.php">try anther one</a></h2></center><h2></h2>
    <?php
   exit; 




}

//ادخال البيانات
$password=md5($password);
$int="insert into users(username,password,email) values ('$username','$password','$email')";
$query=mysqli_query($connect,$int);
$_SESSION['username']=$username;
?>
<h2> register successfuly</h2>
<meta http-equiv="refresh" content="3;url='../index.php'" />
<?php
}

?>