<?php
$connect=mysqli_connect('localhost','root','13','geng');

$sql="select * from threads where id='$id'";
$query=mysqli_query($connect,$sql);

	while($row=mysqli_fetch_object($query)) {
		
		
		
		?>
        
        <form action="<?php echo $PHP_SELF; ?>" method="post" >
        
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
       title:   <input type="text" name="title" value="<?php echo $row->title; ?>" /><br />
        
      thread:<br /><textarea name="topic" rows='5' cols="65">
      <?php echo $row->topic; ?>
      </textarea><br />
        <input type="submit" name="submit" value="update" />
        
        
        </form>

<?php
}	
$sql2="UPDATE threads SET topic='$topic' title='$title' WHERE id='$id'";
		$query2=mysqli_query($connect,$sql2);
		
	if($_POST['submit']){
		echo "تم تحديث البيانات بنجاح ";
		
		}



	
?>