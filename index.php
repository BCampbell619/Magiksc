<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="0SfTFxW23_wV-6_YvY9awWOmw8u9k260e5C8vyOH6lM" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Magik - Custom Motocross Graphics</title>
<meta name="Description" content="Magik is your number one source for motocross graphics and dirtbike accessories.">
<meta name="keywords" content="motocross graphics, dirt bike, motocross, graphics, custom graphics, MX Graphics, graphics kits">



<?php include 'template/header.php'; ?>





<div style="float:left; padding:4px 3px 4px 3px;">
<table>
<tr>
<td>
<div class="homeflash">
<img src="images/Homepage_landing_2018.jpeg" width="755px" height="320">
<!-- <script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '755',
			'height', '320',
			'src', 'HomeSlide2',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'HomeSlide2',
			'bgcolor', '#111111',
			'name', 'HomeSlide2',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'HomeSlide2',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="755" height="320" id="HomeSlide2" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="HomeSlide2.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000" />	<embed src="HomeSlide.swf" quality="high" bgcolor="#000" width="755" height="320" name="HomeSlide2" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript> -->
</div>



</td>
<td width="2px">
</td>
<td>

<div class="featuredproduct">

<table align="center" style="text-align:center;" height="310px" >
<tr style="background-image:url(images/featuredkit3.gif);">
<td height="62px" colspan ="3">
</td>
</tr>
<tr>
<td height="13px" colspan ="3">
<div id="featuredlink1">
<?php
$featuredproductcount = 1;
$result = mysql_query("SELECT * FROM featuredkit") or die(mysql_error()); 
		while($row = mysql_fetch_array( $result )) {
			$featuredkit[$featuredproductcount] = $row['featuredkit'];

	
		
		$result2 = mysql_query("SELECT * FROM products WHERE products_id = '$featuredkit[$featuredproductcount]'") or die(mysql_error()); 
		while($row2 = mysql_fetch_array( $result2 )) {
			$productsimage[$featuredproductcount] = $row2['products_image'];
			$productsimage[$featuredproductcount] = "http://www.magiksc.com/store/images/$productsimage[$featuredproductcount]";
		}
		
		$result3 = mysql_query("SELECT * FROM products_description WHERE products_id = '$featuredkit[$featuredproductcount]'") or die(mysql_error()); 
		while($row3 = mysql_fetch_array( $result3 )) {
			$productsname[$featuredproductcount] = $row3['products_name'];
			$productsname[$featuredproductcount] = str_replace("'", "", $productsname[$featuredproductcount]);
			
		}
		$productsurl[$featuredproductcount] = str_replace(" ", "-", $productsname[$featuredproductcount]);
		$productsurl[$featuredproductcount] = str_replace("'", "", $productsname[$featuredproductcount]);
		$productsurl[$featuredproductcount] = "http://www.magiksc.com/store/" . $productsurl[$featuredproductcount] . "-p-$featuredkit[$featuredproductcount].html";
		
		if(strlen($productsname[$featuredproductcount]) > 30){$productsname[$featuredproductcount] = substr($productsname[$featuredproductcount], 0, 30); $productsname[$featuredproductcount] = $productsname[$featuredproductcount] . '...';}
		
		$featuredproductcount++;
		}
		
print"<a href='$productsurl[1]'>$productsname[1]</a>";

?>
</div>
</td>
</tr>
<tr>
<td width="213px" height="196px" colspan ="3">
<div id="featuredpic">
<?php 
print"<a class = 'thumbnail' href='$productsurl[1]'><img src='$productsimage[1]' alt='$productsname[1]' title='$productsname[1]' width='190' style='max-height:190px; border:none;'/></a>";
?>
 </div>
</td>
</tr>
<tr>
<td align="right" valign="bottom">
 <img src="images/leftarrow.png" width="23" style="cursor:pointer;" onclick="featuredproduct('left');" alt="cycle left - graphic kits" />
</td>
<td >
<div id="featuredlink2">
<a href="http://www.magiksc.com/store/tgr-2010-team-full-bike-kit-p-137.html"> <b> View Now!</b> </a>
</div>
</td>
<td align="left" valign="bottom">
  <img src="images/rightarrow.png" width="23"  style="cursor:pointer;" onclick="featuredproduct('right');" alt="cycle right - graphic kits" /></td>
</tr>
</table>

</div>
</td> 
</tr>

</table>
</div>

<div style="float:left; padding:1px 3px 2px 6px; height:151px;">
 <!-- <a href="http://www.magiksc.com/gallery.html"> <img src="images/imagegallery.jpg" alt="image gallery - customer graphics" width="324" style="float: left; padding: 0px 0px 0px 0px; border:0;" id="imagegallery" onMouseOver="document.getElementById('imagegallery').src='http://www.magiksc.com/images/imagegallery2.jpg';" onMouseOut="document.getElementById('imagegallery').src='http://www.magiksc.com/images/imagegallery.jpg';" /></a> -->
 <a  target="_blank" href="http://instagram.com/magiksc"> <img src="images/imagegallery.jpg" alt="image gallery - customer graphics" width="324" style="float: left; padding: 0px 0px 0px 0px; border:0;" id="imagegallery" onMouseOver="document.getElementById('imagegallery').src='http://www.magiksc.com/images/imagegallery2.jpg';" onMouseOut="document.getElementById('imagegallery').src='http://www.magiksc.com/images/imagegallery.jpg';" /></a> 
 


 <a href="http://www.magiksc.com/custom_graphics.html" > <img src="images/custombikes.gif" alt="custom MX graphcis" width="324" id="custombike" style="padding: 0px 7px 0px 7px; border:0; float:left;" onMouseOver="document.getElementById('custombike').src='http://www.magiksc.com/images/custombikes2.gif';" onMouseOut="document.getElementById('custombike').src='http://www.magiksc.com/images/custombikes.gif';"/></a>  



 <a target="_blank" href="http://instagram.com/magiksc"><div style=" margin-left:662px; width:324px; height:162px; position: absolute;"><img src="images/socialmedia_2013.png" width="324" height="146" /></div></a> <!-- SnapWidget -->
<!-- SnapWidget -->
<!-- SnapWidget -->
<!-- SnapWidget -->
<!-- SnapWidget -->
<iframe src="https://snapwidget.com/embed/586603" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:325px; height:150px"></iframe>
 
  </div>
  
   
<div style="float:left; padding:0px 3px 6px 6px;">
<div class="hometextbanner">
<ul id="scroller">
	<li>
Welcome to Magik <strong> Custom Motocross Graphics&#33;</strong>  We make it easy to look fresh on race day with custom MX graphics, number plates, leatt graphic kits, and more. Choose from a wide variety of designs and color options for your <strong> motocross graphics </strong>. Don't see exactly what you're looking for online? no problem! We make fully customized, one of a kind <b>motocross graphics</b> too.

    </li>
</ul>

</div>
</div>



 <?php  
$num= rand (0 , 3);
$num2= rand (0 , 3);
?>
<script language="JavaScript" type="text/javascript">
s_s2.prop1="test";
s_s2.eVar1="Message<?php print"$num2"; ?>";
s_s2.eVar2="Recipient<?php print"$num"; ?>";
s_s2.eVar3="Email<?php print"$num"; ?>@gmail.com";

<?php if($num == 0){ ?>
s_s2.products=";test product";
s_s2.events="scAdd";
<?php } ?>
<?php if($num == 1){ ?>
s_s2.products=";test product";
s_s2.events="prodView";
<?php } ?>
<?php if($num == 2){ ?>
s_s2.products=";test product;1;19.99";
s_s2.events="purchase";
<?php } ?>

s.eVar3="Message<?php print"$num2"; ?>";
s.eVar4="Recipient<?php print"$num"; ?>";
s.eVar5="Email<?php print"$num"; ?>@gmail.com";

<?php if($num == 0){ ?>
s.products=";test product";
s.events="scAdd";
<?php } ?>
<?php if($num == 1){ ?>
s.products=";test product";
s.events="prodView";
<?php } ?>
<?php if($num == 2){ ?>
s.products=";test product;1;19.99";
s.events="purchase";
<?php } ?>

</script> 
<?php include 'template/footer.php'; ?>
   




</body>
</html>



<SCRIPT language="JavaScript">
<!--

featuredinterval = setInterval ( "featuredproduct('right')", 10000 );


var num = 1;
function featuredproduct(direction) {
	var direction = direction;

clearInterval ( featuredinterval );
featuredinterval = setInterval ( "featuredproduct('right')", 10000 );

if(direction == "right") num = num + 1;
else if(direction == "left") num = num - 1;
if(num > 5) num = 1;
if(num < 1) num = 5;


if(num == 1){
document.getElementById('featuredlink1').innerHTML='<a href="<?php print"$productsurl[1]";?>"><?php print"$productsname[1]";?></a>';
document.getElementById('featuredlink2').innerHTML='<a href="<?php print"$productsurl[1]";?>"> <b> View Now!</b>  </a>';

document.getElementById('featuredpic').innerHTML='<a class = "thumbnail" href="<?php print"$productsurl[1]";?>"><img src="<?php print"$productsimage[1]";?>" alt="<?php print"$productsname[1]";?>" title=" <?php print"$productsname[1]";?>" width="190" style=" max-height:190px; border:none;"/></a>'; 

}
	  
if(num == 2){
document.getElementById('featuredlink1').innerHTML='<a href="<?php print"$productsurl[2]";?>"><?php print"$productsname[2]";?></a>';
document.getElementById('featuredlink2').innerHTML='<a href="<?php print"$productsurl[2]";?>"> <b> View Now!</b>  </a>';

document.getElementById('featuredpic').innerHTML='<a class = "thumbnail" href="<?php print"$productsurl[2]";?>"><img src="<?php print"$productsimage[2]";?>" alt="<?php print"$productsname[2]";?>" title=" <?php print"$productsname[2]";?>" width="190" style=" max-height:190px; border:none;"/></a>'; 
}
	  
	  
if(num == 3){
document.getElementById('featuredlink1').innerHTML='<a href="<?php print"$productsurl[3]";?>"><?php print"$productsname[3]";?></a>';
document.getElementById('featuredlink2').innerHTML='<a href="<?php print"$productsurl[3]";?>"> <b> View Now!</b>  </a>';

document.getElementById('featuredpic').innerHTML='<a class = "thumbnail" href="<?php print"$productsurl[3]";?>"><img src="<?php print"$productsimage[3]";?>" alt="<?php print"$productsname[3]";?>" title=" <?php print"$productsname[3]";?>" width="190" style=" max-height:190px; border:none;"/></a>'; 
}
	  
if(num == 4){
document.getElementById('featuredlink1').innerHTML='<a href="<?php print"$productsurl[4]";?>"><?php print"$productsname[4]";?></a>';
document.getElementById('featuredlink2').innerHTML='<a href="<?php print"$productsurl[4]";?>"> <b> View Now!</b>  </a>';

document.getElementById('featuredpic').innerHTML='<a class = "thumbnail" href="<?php print"$productsurl[4]";?>"><img src="<?php print"$productsimage[4]";?>" alt="<?php print"$productsname[4]";?>" title=" <?php print"$productsname[4]";?>" width="190" style=" max-height:190px; border:none;"/></a>'; 
}

if(num == 5){

document.getElementById('featuredlink1').innerHTML='<a href="<?php print"$productsurl[5]";?>"><?php print"$productsname[5]";?></a>';
document.getElementById('featuredlink2').innerHTML='<a href="<?php print"$productsurl[5]";?>"> <b> View Now!</b>  </a>';

document.getElementById('featuredpic').innerHTML='<a class = "thumbnail" href="<?php print"$productsurl[5]";?>"><img src="<?php print"$productsimage[5]";?>" alt="<?php print"$productsname[5]";?>" title=" <?php print"$productsname[5]";?>" width="190" style=" max-height:190px; border:none;"/></a>'; 
}
	  	  
}
//-->
</SCRIPT> 
