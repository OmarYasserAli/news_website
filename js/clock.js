<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Mr MoHanD" />

	<title>Untitled 5</title>
    
    <style type="text/css">
    .clockstyle{ background-color: #000;
        color: #f3f;
        padding: 10px ;
       margin: 50px;
        border: 2px inset #ccc;
        font-family: "Onyx" , getget ,sans-serif;
height: 70px;
        font-size: 65px;
      
        font-weight:  inherit;
        letter-spacing: 2px;
        width:250px;
        display:inline;
    }
    
    </style>
</head>
<script type="text/javascript">
function time(){
var d = new Date();
var h = d.getHours();
var m= d.getMinutes();
var s= d.getSeconds();
var diem="AM";
//document.write(h+":"+m+":"+s);


if (h>12){
    h=h-12;
    diem="PM";

    
}
m=checkTime(m);
s=checkTime(s);
h=checkTime(h);
function checkTime(i){
    if(i<10){
        i="0"+i;
    }
    return i;
}
document.getElementById('clockdisplay').innerHTML=h+":"+m+":"+s+" "+diem;
setTimeout(function (){time()},1000);

}



</script>
<body onload="time()">
<div id="clockdisplay" class="clockstyle">

</div>


</body>
</html>