<?php session_start(); 
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
	<title>project</title>
    <?php
    if(isset($_COOKIE['project']) ){
        
        
       $_SESSION['username']=$_COOKIE['project'];
    }
  

 ?>
  
<script src="js/jquery.js"></script>

</script>


<link rel="stylesheet" type="text/css" href="../css/english.css"/>	
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<style type="text/css">


#view {
    
	padding: 3px;
	margin: 5px;
     background: #FFF;
     margin-top: 25px; 
}
#news {
    background: #EEEEEE;
    direction: rtl;
    text-decoration: none;  
    margin-top: 3px;  
    margin-bottom: 3px;
}
#news:hover{
   background:  #C5C5C5; 
}
#pic {
    
    width: 230px;
    height: 180px;
        
}
#title{
    
    height: 100px;
    width: 770px;
    float: left;
    margin-top: -182px;
    margin-right: 0px;
    
}



#news a {
    color: red;
    font-size: 27px;
     text-decoration: none;
}

.pagination a{
    background: #FFF;
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; 
	color: #000099;
}
.pagination a:hover,  .pagination a:active {
	border: 1px solid #000099;

	color: #000;
}



 span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
    	 span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
    
</style>
<link rel="stylesheet" type="text/css" href="../css/english.css"/>	
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
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
<div id="view">	
<center></center>
<?php

	$connect=mysqli_connect('localhost','root','','geng');	

	$tbl_name="threads";		
	
	$adjacents = 3;
	

	$query = "SELECT COUNT(*) as num FROM $tbl_name where type ='healthy'";
	$total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
	$total_pages = $total_pages['num'];
	
	
	$targetpage = "allnews.php"; 	
	$limit = 15; 								
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
		$page=0;
	if($page) 
		$start = ($page - 1) * $limit; 			
	else
		$start = 0;								
	
	
	$sql = "SELECT * FROM $tbl_name where type ='healthy' order by id DESC LIMIT $start, $limit";  
	$result = mysqli_query($connect,$sql);
	
	
	if ($page == 0) $page = 1;					
	$prev = $page - 1;							
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit); 
	$lpm1 = $lastpage - 1;						
	

	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	
		{
			
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next»</span>";
		$pagination.= "</div>\n";		
	}
?>


</center>
	<?php
	

			  
			  while($row=mysqli_fetch_object($result)){
				  
				  ?>
				  <div id="news">
				   <div id="pic"><img src="../image.php?id=<?php echo $row->id; ?>" width="230" height="180"/></div>
                <div id="title">
                <br />
                 <a href="news.php?id=<?php echo $row->id;?>"> <?php echo stripslashes($row->title)."<br>"; ?> </a>
				 
                <font size='2'><?php echo $row->date."<br>"; ?>
                عدد مرات المشاهدة : <?php print $row->view; ?>
                </font> 
                
              
                </div>
                 
				  </div>
				  <?php
				  }
				  
				  			
           
	?>


<center>


<?=$pagination?>
</center>
</div>

</div>
		


</body>
</html>