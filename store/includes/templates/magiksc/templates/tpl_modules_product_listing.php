<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_product_listing.php 3241 2006-03-22 04:27:27Z ajeh $
 */
 include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING));
 echo "\n";
?>

<div id="productListing">
<div class="container-fluid">
<div class="row justify-content-end">
<?php
// only show when there is something to submit and enabled
    if ($show_top_submit_button == true) {
?>
<!-- <div class="buttonRow forward"><?php //echo zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit1" name="submit1"'); ?></div> -->
<div class="buttonRow forward col-xs-3 col-sm-3 col-md-3 col-lg-3"><button type="submit" name="submit1" id="submit1">Add to Cart</button></div>
<br class="clearBoth" />
</div> <!-- end of row -->
<?php
    } // show top submit
?>

<?php if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<div class="row justify-content-start">
<div id="productsListingTopNumber" class="navSplitPagesResult back col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></div>
<div id="productsListingListingTopLinks" class="navSplitPagesLinks forward col-xs-6 col-sm-6 col-md-4 col-lg-4"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>
<br class="clearBoth" />
</div> <!-- end of row -->
</div> <!-- end of container-fluid -->
<?php
}
?>

<?php
/**
 * load the list_box_content template to display the products
 */
  require($template->get_template_dir('tpl_tabular_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_tabular_display.php');
?>

<?php if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>
<div class="container-fluid">
<div class="row justify-content-start">
<div id="productsListingBottomNumber" class="navSplitPagesResult back col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></div>

<div  id="productsListingListingBottomLinks" class="navSplitPagesLinks forward"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></div>
<br class="clearBoth" />
</div> <!-- end of row 1 bottom -->
<?php
  }
?>

<?php
// only show when there is something to submit and enabled
    if ($show_bottom_submit_button == true) {
?>
<div class="row justify-content-end">
<!--<div class="buttonRow forward"><?php //echo zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit2" name="submit1"'); ?></div>-->
<div class="buttonRow forward col-xs-2 col-sm-2 col-md-2 col-lg-2"><button type="submit" name="submit1" id="submit2">Add to Cart</button></div>
<br class="clearBoth" />
</div><!-- end of row 2 bottom -->
<?php
    } // show_bottom_submit_button
?>
</div> <!-- end of container-fluid botton -->
</div>

<?php
// if ($show_top_submit_button == true or $show_bottom_submit_button == true or (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0 and $show_submit == true and $listing_split->number_of_rows > 0)) {
  if ($show_top_submit_button == true or $show_bottom_submit_button == true) {
?>
</form>
<?php } ?>
