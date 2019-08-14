
<link href="magikStyle.css" rel="stylesheet" type="text/css" />

<script src="AC_RunActiveContent.js" language="javascript"></script>
<script type="text/javascript" src="http://www.magiksc.com/jquery.js"></script>
<script type="text/javascript" src="http://www.magiksc.com/simplyscroll.js"></script>
<script type="text/javascript">
(function($) {
	$(function() { //on DOM ready
		$("#scroller").simplyScroll({
			autoMode: 'loop'
		});
	});
})(jQuery);
</script>


</head>

<?php

mysql_connect("magiksc.db.3266225.hostedresource.com", "magiksc", "Ss790955") or die(mysql_error());
mysql_select_db("magiksc") or die(mysql_error());

$result = mysql_query("SELECT * FROM turnaround") or die(mysql_error()); 
		while($row = mysql_fetch_array( $result )) {
			$turnaround = $row['turnaround'];
		}		
?>
		

<body>


<div style="float:left; height:15px;"><h1><a href="http://www.magiksc.com" title="Motocross Graphics"><font color="#666666"> Motocross Graphics and Dirt Bike Accessories</font></a></h1></div>
<div style="float:right; height:15px; font-family: Arial; font-size: 11px; color: #666666; font-weight:bold; border:0;display:inline;"> Current turnaround time for graphic proofs is about <?php print"$turnaround"; ?> Days </div>
<div class="main">

<table cellpadding="0" cellspacing="0">
<tr>
  
<!-- <div class="headingline2" id="subheading" name="subheading">
<!-- <a href="http://www.magiksc.com/store/magik-sc-graphics-honda-graphics-c-29_36.html"> HONDA </a> &nbsp;|&nbsp; --> <!-- <a href="http://www.magiksc.com/store/magik-sc-graphics-kawasaki-graphics-c-29_39.html"> KAWASAKI </a> &nbsp;|&nbsp; <a href="http://www.magiksc.com/store/magik-sc-graphics-ktm-graphics-c-29_38.html"> KTM </a> &nbsp;|&nbsp; <a href="http://www.magiksc.com/store/magik-sc-graphics-suzuki-graphics-c-29_40.html"> SUZUKI </a> &nbsp;|&nbsp; <a href="http://www.magiksc.com/store/magik-sc-graphics-yamaha-graphics-c-29_37.html"> YAMAHA </a> &nbsp;|&nbsp; <a href="http://www.magiksc.com/store/magik-sc-graphics-pitbike-graphics-c-29_41.html"> PIT BIKE / OTHER </a>
</div> -->

<?php include('nav.php'); ?>



<!-- Honda Notice -->

<style>
    
        .notice {
            background: #000;
            border: solid 1px #000;
            color: #FFF;
            font-weight: 300;
            float: left;
            padding: 4px;
            width: 992px;
        }
        
        .notice>.itm_wrap>img, .notice>.itm_wrap>p {
            display: inline-block;
        }
        
        .itm_wrap_img {
            float: left;
            height: 60px;
            padding: 12px 8px 8px 16px;
            width: 50px;
        }
        
        .itm_wrap_text {
            float: left;
            height: 60px;
            margin: 8px 0 8px 0;
            width: 92%;
        }
        
        .notice>img {
            padding: 8px 0 0 0;
        }
        
        .itm_wrap_text>p {
            font-size: 18px;
            font-weight: 300;
            font-family: sans-serif;
            margin: 0px;
            padding: 0px;
        }
        
        .notice .a {
            color: rgb(255,255,255);
            cursor: pointer;
            text-decoration: none;
        }
        
        .notice .a:hover {
            color: #666;
            cursor: pointer;
            text-decoration: none;
        }
    
</style>

<!-- <div class="notice">
    <div class="itm_wrap_img"><img src="images/alert.png" alt="alert"></div>
    <div class="itm_wrap_text"><p>Our custom graphics section for Honda Motorcycles is currently under construction in our store. However, please contact us with questions and requests about custom graphics for your Honda Motorcycle <a class="a" href="contactus.html">here</a>. Or contact us through email at orders@magiksc.com or by phone (951) 654-5550</p></div>
</div> -->

<!-- end of Honda Notice -->