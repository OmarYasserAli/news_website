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
    direction: rtl;
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
$sql="SELECT * from threads WHERE id='$id'";
  
   $query=mysqli_query($connect,$sql);
   while($data=mysqli_fetch_array($query)){
?>

<form action="delete.php?id=<?php echo $id ?>" method="POST">
<div id="show"><?php echo $data['title']; ?></div>
<div id="show"><?php echo $data['topic']; ?></div>
<input id="del" type="submit" name="delete" value="Delete"/>
<a id="del" href="edit.php" target="left">Back</a>
تاكيد عملية الحذف

</form>

<?php
$delete=0;
 if(isset($_POST['delete']))
$delete=$_POST['delete'];
if(($delete)){
     
    $del="DELETE FROM threads WHERE id='$id'";
     $del2="DELETE FROM images WHERE id='$id'";
    $query2=mysqli_query($connect,$del);
    $query3=mysqli_query($connect,$del2);
    echo"تم حذف الموضوع ";
    echo"<meta http-equiv='refresh' content='1;url=edit.php'/>";
}}
?>