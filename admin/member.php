<?php
session_start();
if($_SESSION['username']!='admin'){
    header("location:../index.php");
}    
?>
<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
<style type="text/css">
table {
    
    margin-left:auto;
margin-right:auto;
}
tr{
    
    height: 28px;
    text-align: center;
}
a{
    width: 55px;
    height: 28px;
    text-decoration: none;
    background: yellow;
    
}
</style>
<?php

$connect=mysqli_connect('localhost','root','','geng');
	
	$sql="SELECT * from users ";
	$query=mysqli_query($connect,$sql);
	 echo "<table border='1' width='40%' cellpadding='0' cellspacing='0' bordercolor=#000 ";
    echo "<tr>";
     echo "<td width='38'>";
				  echo "ID";
				  echo "</td>";
                  echo "<td>";
				  echo 'member';
				  echo "</td>";
                  echo "<td width='55'>";
				  echo "#";
				  echo "</td>";
                  echo "</tr>";
	while($row=mysqli_fetch_object($query)) {
		
          echo "<tr>";
          echo "<td width='38'>";
				  echo $row->id;
				  echo "</td>";
				  echo "<td>";
				  echo $row->username;
				  echo "</td>";
                
                  echo "<td width='55'>";
				  echo "<a href='member_del.php?id=$row->id' id='edit'>Delete</a>";
				  echo "</td>";
                  
				  echo "</tr>";
		
        }
        
		
		?>