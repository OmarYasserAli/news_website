<?php
session_start();
if($_SESSION['username']!="admin"){
    header("location:../index.php");
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
<?php
if(isset($_POST['title']))
{//vars
$title=$_POST['title'];
$topic=$_POST['elm1'];
$date=date("D d/M/Y  h:i");
$news_type=$_POST['ntype'];

//photo
   $path=$_FILES['upload']['tmp_name'];
   $name=$_FILES['upload']['name'];
   $size=$_FILES['upload']['size'];
   $type=$_FILES['upload']['type'];
   $error=$_FILES['upload']['error'];
}
$formok=false;
if(isset($_POST['add']) && !empty($_FILES)){
    
    
    $formok=TRUE;
    
    	if(!is_uploaded_file($path)){
		
		$formok=false;
		echo"chose a photo to your thread<br>";
		
		}
		
		//check file extension
		
		if(!in_array($type,array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))){
			$formok=false;
			echo "this file not a photo<br>";
			
			}
			
			if(filesize($path) > 800000){
				
				$formok=false;
				echo "this photo is too big";
				
				
				}
                if(empty($title)){
                    
                    $formok=false;
                    echo("write a title");
                }
                if(empty($topic)){
                    
                    $formok=false;
                    echo("write your thread");
                }
                
		  if(empty($news_type)){
                    
                    $formok=false;
                    echo("chose the news type");
                }
                
	
	}
    
        
    
	if($formok){
		
		if($connect=mysqli_connect('localhost','root','','geng')){
			//mysql_query('set * "utf8"');
			$content=file_get_contents($path);
			$safetitle=mysqli_real_escape_string($connect,$title);
            $saf="$safetitle";
			$safethread=mysqli_real_escape_string($connect,$topic);
			$safeimage=mysqli_real_escape_string($connect,$content);
			
			
			$sqlthread="insert into  threads(title,topic,date,type) values ('$saf','$safethread','$date','$news_type')";
			
			$sqlimage="insert into images(name,size,type,content) values ('$name','$size','$type','$safeimage')";
			
			
			
			$querythread=mysqli_query($connect,$sqlthread);
			$queryimage=mysqli_query($connect,$sqlimage);
			
			
			if($querythread && $queryimage){
				
				$imageid=mysqli_insert_id($connect);
				?>
                <h2> new topic added</h2>
                
                <?php
				}
                
				
				mysqli_close($connect);
			
    ?>
    
 <meta http-equiv="refresh" content="1;url=left.php"  /> 
<?php
} 
}?>

<script type="text/javascript" src="tiny/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
	
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

<p>Title<br /> <input type="text" name="title" /> </p>
<p> type:
<select name="ntype">
<option value="sport">رياضة</option>
<option value="politcs">سياسة</option>
<option value="education">تعليم</option>
<option value="acc">حوادث</option>
<option value="helthy">صحة</option>
<option value="eco">اقتصاد</option>
</select>

</p>
<div>
<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%">	
</textarea>
</div>

<p>
<input type="hidden" name="MAX_FILE_SIZE" value="800000" />
<input type="file" name="upload"  />
</p>

<p><input type="submit" name="add" value="Add topic"/><input type="reset" value="remove"/></p>

</form>