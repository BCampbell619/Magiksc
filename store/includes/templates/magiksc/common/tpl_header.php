<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br /> */
  $flag_disable_header = true;
 /*
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Sat Oct 17 22:01:06 2015 -0400 Modified in v1.5.5 $
 */
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
    echo zen_output_string_protected(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo zen_output_string_protected($_GET['info_message']);
  }
?>


<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

<div id="headerWrapper">
<!--bof-navigation display-->
<div id="navMainWrapper">
<div id="navMain">
    <ul class="back">
    <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
<?php if ($_SESSION['customer_id']) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
<?php } } ?>

<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></li>
<?php }?>
</ul>
</div>
<div id="navMainSearch"><?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?></div>
<br class="clearBoth" />
</div>
<!--eof-navigation display-->

<!--bof-branding display-->
<div id="logoWrapper">
    <div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT, HEADER_LOGO_WIDTH, HEADER_LOGO_HEIGHT) . '</a>'; ?></div>
<?php if (HEADER_SALES_TEXT != '' || (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2))) { ?>
    <div id="taglineWrapper">
<?php
              if (HEADER_SALES_TEXT != '') {
?>
      <div id="tagline"><?php echo HEADER_SALES_TEXT;?></div>
<?php
              }
?>
<?php
              if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
<?php
                }
              }
?>
    </div>
<?php } // no HEADER_SALES_TEXT or SHOW_BANNERS_GROUP_SET2 ?>
</div>
<br class="clearBoth" />
<!--eof-branding display-->

<!--eof-header logo and navigation display-->

<!--bof-optional categories tabs navigation display-->
<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
<!--eof-optional categories tabs navigation display-->

<!--bof-header ezpage links-->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!--eof-header ezpage links-->
</div>
<?php } ?>

<!--  Start of custom header  -->


<div class="container-fluid">
    <div class="row">
        <div class="topNav col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul>
               <li style="float: left;">CURRENT TURNAROUND&#58; <strong>ABOUT 4 DAYS</strong> </li>
                <li><div class="addthis_toolbox addthis_default_style"><a class="addthis_button_instagram_follow" addthis:userid="magiksc"><img src="includes/templates/magiksc/images/instagram.png" alt="Instagram icon" title="Follow Magiksc"></a></div></li>
                <li><a href="http://www.magiksc.com/about.html">ABOUT US</a></li>
                <li><a href="http://www.magiksc.com/contactus.html">CONTACT</a></li>
            </ul>
        </div>
    </div>
</div>
  
<nav class="mgkNav">

    <a class="logo" href="http://www.thecampbellscorner.com/magiksc/index.php"><img src="includes/templates/magiksc/images/logo.png" alt="Magik Logo"></a>
    
    <button class="navToggle" data-target="MobileList">
    </button>

    <div class="Collapsed" id="list">
      <ul>
          <li class="dropdown" id="MXList">
              <a href="#">MOTO <img src="includes/templates/magiksc/images/chevronDownBlack.png" alt="Carat" id="arrDown" width="10" height="12"></a>
                <div class="drop-MX-hide" id="ProdOptions">          
                    <ul>
                        <li><a href="http://www.magiksc.com/store/magik-sc-graphics-c-29.html">FULL BIKE KITS</a></li>
                        <li><a href="http://www.magiksc.com/store/number-plates-c-30.html">NUMBER PLATES</a></li>
                        <li><a href="http://www.magiksc.com/store/trim-and-individual-decals-c-48.html">INDIVIUAL GRAPHICS</a></li>
                        <li><a href="http://www.magiksc.com/store/rider-id-c-1.html">RIDER I&#46;D&#46;</a></li>
                    </ul>
                    <ul>
                        <li><a href="http://www.magiksc.com/store/seat-covers-c-44.html">SEAT COVERS</a></li>
                        <li><a href="http://www.magiksc.com/store/moto-stands-c-22.html">STAND &amp; TOOL BOX KITS</a></li>
                        <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">POP UP CANOPY</a></li>
                        <li><a href="http://www.magiksc.com/store/apparel-c-3.html">MOTO ACCESSORIES</a></li>
                    </ul>
                </div>
          </li>
          <li class="dropdown" id="HelmetNav">
              <a href="#">HELMETS <img src="includes/templates/magiksc/images/chevronDownBlack.png" alt="Carat" id="arrDown" width="10" height="12"></a>
                  <div class="drop-HT-hide" id="HelmetOptions">          
                    <ul>
                        <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HELMET WRAP</a></li>
                        <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HELMET ID KITS</a></li>
                        <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HALF SHELL HELMETS</a></li>
                        <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">FULL FACE HELMETS</a></li>
                    </ul>
              </div>
          </li>
         <!-- <li class="dropdown" id="BikeNav">
              <a href="#">BIKE <img src="includes/templates/magiksc/images/chevronDownBlack.png" alt="Carat" id="arrDown" width="10" height="12"></a>
                  <div class="drop-BK-hide" id="BikeOptions">          
                    <ul>
                        <li><a href="http://www.magiksc.com/store/magik-sc-graphics-c-29.html">CUSTOM FENDERS</a></li>
                        <li><a href="http://www.magiksc.com/store/number-plates-c-30.html">FORK DECALS</a></li>
                        <li><a href="http://www.magiksc.com/store/trim-and-individual-decals-c-48.html">PROTECTION SHEETS</a></li>
                        <li><a href="http://www.magiksc.com/store/rider-id-c-1.html">BOX NUMBER PLATE</a></li>
                        
                    </ul>
                    <ul>
                        <li><a href="http://www.magiksc.com/store/seat-covers-c-44.html">RIM DECAL SETS</a></li>
                        <li><a href="http://www.magiksc.com/store/moto-stands-c-22.html">HALF SHELL HELMETS</a></li>
                        <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">FULL FACE HELMETS</a></li>
                        <li><a href="http://www.magiksc.com/store/apparel-c-3.html">BIKE ACCESSORIES</a></li>
                    </ul>
                </div>
          </li> -->
          <li class="dropdown" id="OffRdNav">
              <a href="#">OFF-ROAD <img src="includes/templates/magiksc/images/chevronDownBlack.png" alt="Carat" id="arrDown" width="10" height="12"></a>
                  <div class="drop-UTV-hide" id="UTVOptions">          
                    <ul>
                        <li><a href="http://www.magiksc.com/store/utv-graphic-kits-c-64.html">UTV GRAPHIC KITS</a></li>
                        <li><a href="http://www.magiksc.com/store/magik-banners-stickers-c-57.html">PIT ESSENTIALS</a></li>
                        <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">POP UP CANOPY</a></li>
                    </ul>
                </div>
          </li>

      </ul>
    </div>      
</nav>

<div class="navCollapse" id="MobileList">
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="navColMain">
           <h5>MOTO</h5>
            <ul>
                <li><a href="http://www.magiksc.com/store/magik-sc-graphics-c-29.html">FULL BIKE KITS</a></li>
                <li><a href="http://www.magiksc.com/store/number-plates-c-30.html">NUMBER PLATES</a></li>
                <li><a href="http://www.magiksc.com/store/trim-and-individual-decals-c-48.html">INDIVIUAL GRAPHICS</a></li>
                <li><a href="http://www.magiksc.com/store/rider-id-c-1.html">RIDER I&#46;D&#46;</a></li>
                <li><a href="http://www.magiksc.com/store/seat-covers-c-44.html">SEAT COVERS</a></li>
                <li><a href="http://www.magiksc.com/store/moto-stands-c-22.html">STAND &amp; TOOL BOX KITS</a></li>
                <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">POP UP CANOPY</a></li>
                <li><a href="http://www.magiksc.com/store/apparel-c-3.html">MOTO ACCESSORIES</a></li>
            </ul>
            <h5>HELEMTS</h5>
            <ul>
                <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HELMET WRAP</a></li>
                <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HELMET ID KITS</a></li>
                <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">HALF SHELL HELMETS</a></li>
                <li><a href="http://www.magiksc.com/store/helmet-graphic-kits-c-56.html">FULL FACE HELMETS</a></li>
            </ul>
            <!--<h5>BIKE</h5>
            <ul>
                <li><a href="http://www.magiksc.com/store/magik-sc-graphics-c-29.html">MTB CUSTOM FENDERS</a></li>
                <li><a href="http://www.magiksc.com/store/number-plates-c-30.html">FORK DECALS</a></li>
                <li><a href="http://www.magiksc.com/store/trim-and-individual-decals-c-48.html">PROTECTION SHEETS</a></li>
                <li><a href="http://www.magiksc.com/store/rider-id-c-1.html">BOX NUMBER PLATE</a></li>
                <li><a href="http://www.magiksc.com/store/seat-covers-c-44.html">RIM DECAL SETS</a></li>
                <li><a href="http://www.magiksc.com/store/moto-stands-c-22.html">HALF SHELL HELMETS</a></li>
                <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">FULL FACE HELMETS</a></li>
                <li><a href="http://www.magiksc.com/store/apparel-c-3.html">BIKE ACCESSORIES</a></li>
            </ul>-->
            <h5>OFF-ROAD</h5>
            <ul>
                <li><a href="http://www.magiksc.com/store/utv-graphic-kits-c-64.html">UTV GRAPHIC KITS</a></li>
                <li><a href="http://www.magiksc.com/store/magik-banners-stickers-c-57.html">PIT ESSENTIALS</a></li>
                <li><a href="http://www.magiksc.com/store/pop-up-tents-c-58.html">POP UP CANOPY</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="navColFt">
           <h5>CONTACT US</h5>
            <ul>
                <li><a href="http://www.magiksc.com/contactus.html">CONTACT</a></li>
                <li><a href="http://www.magiksc.com/about.html">ABOUT US</a></li>
                <li><div class="addthis_toolbox addthis_default_style"><a class="addthis_button_instagram_follow" addthis:userid="magiksc"><img src="images/instagram.png" alt="Instagram icon" title="Follow Magiksc"></a></div></li>
            </ul>
            <h5>CURRENT TURNAROUND&#58; <strong>ABOUT 4 DAYS</strong></h5>
        </div>
    </div>
</div>


<!--   End of custom header   -->