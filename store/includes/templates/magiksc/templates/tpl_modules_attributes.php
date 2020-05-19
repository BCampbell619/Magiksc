<?php
/**
 * Module Template
 *
 * Template used to render attribute display/input fields
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mc12345678 Tue May 8 00:42:18 2018 -0400 Modified in v1.5.6 $
 */

/*
$optionName = ["Year", "Model", "Main Color", "Accent Color 1", "Accent Color 2", "Number Plate Background Color", "Race Number", "Number Color", "Number Font", "Rider Name", "Name Color", "Name Font", "Name on Side Panel", "Air Box Logo 1", "Air Box Logo 2", "Air Box Logo 3", "Swing Arm Logo 1", "Swing Arm Logo 2", "Swing Arm Logo 3", "Shroud Logo 1 (main)", "Shroud Logo 2", "Shroud Logo 3", "Fork Guard Logo 1", "Fork Guard Logo 2", "Fork Guard Logo 3", "Fork Guard Logo 4", "Front Fender Logo 1", "Front Fender Logo 2", "Front Fender Logo 3", "Rear Fender Logo 1 (sides)", "Rear Fender Logo 2", "Rear Fender Logo 3", "Rear Fender Logo 4", "Rear Fender Logo 5", "Rear Fender Logo 6", "Rear Fender Logo 7", "Rear Fender Logo 8", "Custom Logo 1", "Custom Logo 2", "Custom Logo 3", "Do you want to include UFO repla", "Plastics Color [If selected Abov", "Please mount my order", "Rush Order", "Additional Information"];
*/

/*echo "$"."options_name call out"."<br>";
echo "<pre>";
print_r($options_name);
echo "</pre>"."<br>";

echo "$"."options_comment call out"."<br>";
echo "<pre>";
print_r($options_comment);
echo "</pre>"."<br>";

echo "$"."options_comment_position call out"."<br>";
echo "<pre>";
print_r($options_comment_position);
echo "</pre>"."<br>";

echo "$"."options_html_id call out"."<br>";
echo "<pre>";
print_r($options_html_id);
echo "</pre>"."<br>";

echo "$"."options_attributes_image call out"."<br>";
echo "<pre>";
print_r($options_attributes_image);
echo "</pre>"."<br>";*/

?>
<div class="row">
<div class="col-12">
<h3 class="text-center" id="attribsOptionsText"><?php echo TEXT_PRODUCT_OPTIONS; ?></h3>
</div>
<div id="test" class="form-group" id="productAttributes">
<?php if ($zv_display_select_option > 0) { ?>

<?php } // show please select unless all are readonly ?>

<?php
    for($i=0, $j=sizeof($options_name); $i<$j; $i++) {
?>
<?php
  if ($options_comment[$i] != '' and $options_comment_position[$i] == '0') {
?>
<h3 class="attributesComments"><?php echo $options_comment[$i]; ?></h3>
<?php
  }
        
?>

<div class="col-xs-12 col-sm-12 offset-md-1 col-md-10 wrapperAttribsOptions" id="<?php echo $options_html_id[$i]; ?>">
<?php echo $options_name[$i]; ?>
<?php echo $options_menu[$i]; ?>

</div>

<?php if ($options_comment[$i] != '' and $options_comment_position[$i] == '1') { ?>
    <div class="ProductInfoComments"><?php echo $options_comment[$i]; ?></div>
<?php } ?>


<?php
if (isset($options_attributes_image[$i]) && $options_attributes_image[$i] != '') {
?>
<?php echo $options_attributes_image[$i]; ?>
<?php
}
?>

<?php
    }
?>

</div>
<!-- end of Form Group -->

</div><!-- end of Row -->
<?php
  /*if ($show_onetime_charges_description == 'true') {*/
?>
    <!--<div class="wrapperAttribsOneTime"><?php //echo TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION; ?></div>-->
<?php /*}*/ ?>


<?php
  /*if ($show_attributes_qty_prices_description == 'true') {*/
?>
    <!--<div class="wrapperAttribsQtyPrices"><?php //echo zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;' . '<a href="javascript:popupWindowPrice(\'' . zen_href_link(FILENAME_POPUP_ATTRIBUTES_QTY_PRICES, 'products_id=' . $_GET['products_id'] . '&products_tax_class_id=' . $products_tax_class_id) . '\')">' . TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK . '</a>'; ?></div>-->
<?php /*}*/ ?>
<script>
    
    $(function () {
        
        $("#attribsOptionsText").click(function () {
    
            $("#test").slideToggle(400);
    
        });
        
    });


</script>