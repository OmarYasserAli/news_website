<?php 
session_start();
if($_SESSION['username']!='admin'){
    header("location:../index.php");
    
}
?>
<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
<script  src="../js/jquery"></script>
<script>
   $(document).ready(function() {$("tr:odd").addClass("odd");});
   </script>
<style type="text/css">

	.odd{

	 background-color: #E8E8E8;
		}
	div {
		padding: 3px;
		margin: 5px;
	}

	a {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #AAAADD;
		
		text-decoration: none; 
		color: #000099;
	}
	 a:hover,  a:active {
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
		
		
	table{
	    
	    direction: rtl;
	    
	}
	td{
	     padding: 8px;
	}
	tr{
	   
	    background:  #BCBCBC;  
	}
	#edit{
	    padding: 5px;
	    background:  yellow;
	    
	}


</style>
<?php

	$connect=mysqli_connect('localhost','root','','geng');	

	$tbl_name="threads";		
	
	$adjacents = 3;
	

	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
	$total_pages = $total_pages['num'];
	
	
	$targetpage = "edit.php"; 	
	$limit = 12; 								
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
	
	
	$sql = "SELECT * FROM $tbl_name order by id DESC LIMIT $start, $limit";  
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
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>

<center>
	<?php
	
	 echo "<table border='1' width='90%' cellpadding='0' cellspacing='0' bordercolor=#fff ";
			  
			  while($row=mysqli_fetch_object($result)){
				  
				  
				  
				  echo "<tr>";
				  echo "<td>";
				  echo $row->title;
				  echo "</td>";
                   echo "<td width='28'>";
				  echo "<a href='edit_P.php?id=$row->id' id='edit'>Edit</a>";
				  echo "</td>";
                  echo "<td width='25'>";
				  echo "<a href='delete.php?id=$row->id' id='edit'>Delete</a>";
				  echo "</td>";
                  
				  echo "</tr>";
				  
				  
				  }
				  
				  
			echo "</table";
           
	?>

<?=$pagination?>
	