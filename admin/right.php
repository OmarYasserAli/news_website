<?php
session_start();
if($_SESSION['username']!="admin"){
    header("location:../index.php");
    
}
?>
<div id="wrapright">

<ul>

<h3>لوحة التحكم</h3>

<li><a href="add.php"  target="left">اضافة موضوع</a></li>
<li><a href="edit.php"  target="left">تعديل/حذف موضوع</a></li>
<li><a href="member.php"  target="left">حـــذف عضوية</a></li>
<li><a href="#"  target="left">اغلاق الموقع</a></li>

</ul>
<br /><br />
<h3><a href="../index.php" target="_top">عودة للرئيسية</a></h3>


</div>