<?php


$imageid=$_GET['id'];

if($connect=mysqli_connect('localhost','root','','geng')) {
	
	
	//$escape=mysqli_real_escape_string($connect,$content);
	$sql="select type,content from images where id='".$imageid."'";
	$query=mysqli_query($connect,$sql); 
	$fetch=mysqli_fetch_array($query,MYSQLI_ASSOC);
	mysqli_free_result($query);
	mysqli_close($connect);
	
	
	
	}
	



if(!empty($fetch)){
	
	header("Content-type:{$fetch['type']}");
	echo $fetch['content'];
	
	
	}


?>