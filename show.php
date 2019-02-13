
<!DOCTYPE HTML>
<?php



if($connect=mysqli_connect('localhost','root','','geng')){
	
	
          $sql="select * from threads  ORDER BY id desc limit 8";
		  $query=mysqli_query($connect,$sql);
		  
		  
		  if(mysqli_num_rows($query) >0){
			  


        
        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
            $con['title'][]=$row['title'];
            $con['id'][]=$row['id'];
        }
        
    }
    
}


?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Mr MoHanD" />
<link rel="stylesheet" href="css/global.css"/>

	<script src="js/jquery.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	
	<title>Untitled 2</title>
    	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
</head>

<body>

	<div id="container">
		<div id="example">
			<img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
			<div id="slides">
				<div class="slides_container">
					<div class="slide">
						<a href="" title="view/news.php?id=<?php print $con['id'][0]; ?>" ><?php echo "<img src=\"image.php?id=".$con['id'][0]." \"  width=770 height=370   />";?></a>
						<div class="caption" style="bottom:0">
							<p ><?php print $con['title'][0];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][1]; ?>" title="" ><?php echo "<img src=\"image.php?id=".$con['id'][1]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][1];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][2]; ?>" title="" ><?php echo "<img src=\"image.php?id=".$con['id'][2]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][2];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][3]; ?>" title=""><?php echo "<img src=\"image.php?id=".$con['id'][3]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][3];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][4]; ?>" title=""><?php echo "<img src=\"image.php?id=".$con['id'][4]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][4];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][5]; ?>" title=""><?php echo "<img src=\"image.php?id=".$con['id'][5]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][5];?></p>
						</div>
					</div>
					<div class="slide">
						<a href="view/news.php?id=<?php print $con['id'][6]; ?>" title=""><?php echo "<img src=\"image.php?id=".$con['id'][6]." \"  width=770 height=370   />";?></a>
						<div class="caption">
							<p><?php print $con['title'][6];?></p>
						</div>
					</div>
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>
	
	</div>

</body>
</html>