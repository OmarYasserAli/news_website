<?php 
session_start();
if($_SESSION['username']!='admin'){
    header("location:../index.php");
    
}
?>
<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
<style type="text/css">
#show {
    width: auto;
    height: auto;
    border: 1px solid #000;
    
}
#del
{
    cursor: pointer;
    text-decoration: none;
    border: 1px solid #000;
    border-radius: 2px;
    background: silver;
}
a{
    padding-left: 7px;
    padding-right: 7px;
}
</style>

<?php
$id=$_GET['id'];
$connect=mysqli_connect('localhost','root','','geng');
$sql="SELECT * from users WHERE id='$id'";

$query=mysqli_query($connect,$sql);
   while($data=mysqli_fetch_array($query)){
    ?>
    <form action="member_del.php?id=<?php echo $id ?>" method="POST">
   <h3> <div id="show"><?php echo $data['username']; ?></div></h3>

<input id="del" type="submit" name="delete" value="Delete"/>
<a id="del" href="edit.php" target="left">Back</a>
تاكيد عملية الحذف

</form>
    
    
    
    <?php
    
    if(isset($_POST['delete']    )){
     
    $del="DELETE FROM users WHERE id='$id'";
     
    $query2=mysqli_query($connect,$del);
    
    echo"تم حذف العضو";
    echo"<meta http-equiv='refresh' content='2;url=member.php'/>";
}

}
?>
