<?php


if($connect=mysqli_connect('localhost','root','','geng')) {
	if(isset($_GET['id']))
	$id=$_GET['id'];
	$sql="SELECT * from threads WHERE id='$id'";
	$query=mysqli_query($connect,$sql);
	
	while($row=mysqli_fetch_object($query)) {
		
		
		
		?>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id= <?php echo $row->id; ?>" method="post" >
        
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
       title:   <input type="text" name="title" value="<?php echo $row->title; ?>" /><br />
        
      thread:<br /><textarea name="topic" rows='5' cols="65" >
      <?php echo $row->topic; ?>
      </textarea><br />
        <input type="submit" name="submit" value="update" />
        
        
        </form>
        
		
		
		<?php
		}
        if(isset($_POST['submit'])){
            if(empty($_POST['title'])){
               echo "ادخل العنوان الجديد"; 
                
            }
            elseif(empty($_POST['topic'])){
               echo "ادخل الموضوع الجديد "; 
                
            }
            else{
            	$topic=$_POST['topic'];
            	$title=$_POST['title'];
		$sql2="UPDATE threads SET topic='$topic', title='$title' WHERE id='$id'";
		
		$query2=mysqli_query($connect,$sql2);
		
		
		echo "تم تحديث البيانات بنجاح ";
        ?>
        <meta http-equiv="refresh" content="1;url=edit.php"/>
        <?php
		}
		}
	
		
	
	
	}
	
	else {
		
		echo "فشل الأتصال بقاعدة البيانات ";
		
		}



?>