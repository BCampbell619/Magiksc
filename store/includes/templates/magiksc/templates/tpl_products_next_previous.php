<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_products_next_previous.php 6912 2007-09-02 02:23:45Z drbyte $
 */

/*
 WebMakers.com Added: Previous/Next through categories products
 Thanks to Nirvana, Yoja and Joachim de Boer
 Modifications: Linda McGrath osCommerce@WebMakers.com
*/

?>
<div class="row justify-content-md-center">
<div class="col-3" style="margin: 15px 0;">
<?php
// only display when more than 1
  if ($products_found_count > 1) {
/*<!-- <p class="text-center navNextPrevCounter"><?php echo (PREV_NEXT_PRODUCT); //?><?php echo ($position+1 . "/" . $counter); ?></p> -->*/
?>

<div class="navNextPrevList"><a class="btn btn-dark" style="color: #FFF;" href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>">PREV</a></div>

<div class="navNextPrevList"><a class="btn btn-dark" style="color: #FFF;" href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>">LISTING</a></div>

<div class="navNextPrevList"><a class="btn btn-dark" style="color: #FFF;" href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>">NEXT</a></div>
<?php
  }
?>
</div><!-- end of col-3 -->
</div><!-- end of row for next/previous -->