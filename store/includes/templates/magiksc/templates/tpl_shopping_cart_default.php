<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=shopping_cart.<br />
 * Displays shopping-cart contents
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_shopping_cart_default.php 15881 2010-04-11 16:32:39Z wilt $
 */
?>

<!-- =================== Start of Shopping Cart ==================== -->

<div class="row" id="shoppingCartDefault">
<?php
  if ($flagHasCartContents) {
?>

<?php
  if ($_SESSION['cart']->count_contents() > 0) {
//<div class="forward"><?php echo TEXT_VISITORS_CART; ?><?php /*</div>*/
?>

<?php
  }
?>
<div class="col-12">
    <h1 id="cartDefaultHeading"><?php echo HEADING_TITLE; ?></h1>
</div>

<?php if ($messageStack->size('shopping_cart') > 0) echo $messageStack->output('shopping_cart'); ?>
<div class="col-12">
<?php echo zen_draw_form('cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product', $request_type)); ?>
<div class="row no-gutters">
    <div class="col-12">
        <div id="cartInstructionsDisplay" class="content"><?php echo TEXT_INFORMATION; ?></div>
    </div>
<?php if (!empty($totalsDisplay)) { ?>
    <div class="col-12">
        <div class="cartTotalsDisplay important"><?php echo $totalsDisplay; ?></div>
    </div>
<?php } ?>

<?php  if ($flagAnyOutOfStock) { ?>

<?php    if (STOCK_ALLOW_CHECKOUT == 'true') {  ?>
    <div class="co-12">
        <div class="messageStackError"><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></div>
    </div>

<?php    } else { ?>
    <div class="col-12">
        <div class="messageStackError"><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></div>
    </div>

<?php    } //endif STOCK_ALLOW_CHECKOUT ?>
<?php  } //endif flagAnyOutOfStock ?>
</div><!-- END OF 1ST ROW NO-GUTTERS INSIDE FORM -->

<div class="row no-gutters">
    
    <?php foreach($productArray as $product) {?>
    
    <div class="col-xs-12 col-sm-12 col-md-4 text-center mt-2">
        <?php echo $product['productsImage']; ?>
        <p class="text-center"><?php echo $product['productsName']; ?></p>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
        
        <?php
            echo $product['attributeHiddenField'];
            if (isset($product['attributes']) && is_array($product['attributes'])) {
                echo '<ul>';
                reset($product['attributes']);
                foreach ($product['attributes'] as $option => $value) {
        ?>
        
        <li><?php echo $value['products_options_name'] . TEXT_OPTION_DIVIDER . nl2br($value['products_options_values_name']); ?></li>
        
        <?php
                }
                
                echo '</ul>';
            } else { ?>
                
        <p class="text-center">No Product Attributes</p>    
                
        <?php
            
            }
            
        ?>
        
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
        
        <div class="row no-gutters">
            <div class="col-2 mx-1">
                <?php
                    if ($product['flagShowFixedQuantity']) {
                        echo $product['showFixedQuantityAmount'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>' . $product['showMinUnits'];
                    } else {
                        echo $product['quantityField'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>' . $product['showMinUnits'];
                    }
                ?>
            </div>
            <div class="col-9 mx-1 mt-1">
               
               <?php
                    if ($product['buttonUpdate'] == '') {
                        echo '' ;
                    } else {
                        echo $product['buttonUpdate'];
                    }
                ?>
                
            </div>
            <div class="col-12 mt-2">
                
                <p class="mt-1"><strong>Unit Price:</strong> <span class="ml-3"><?php echo $product['productsPriceEach']; ?></span> </p>
                <p class="mt-1"><strong>Total:</strong> <span class="ml-3"></span> <?php echo $product['productsPrice']; ?></p>
                <?php
                    if ($product['buttonDelete']) {
                ?>
                <a class="mb-2" href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, 'action=remove_product&product_id=' . $product['id']); ?>"><img src="/dev_store/includes/templates/magiksc/images/Close-basic@3x.png" alt="Remove product" title="remove product" width="19px" height="24px"></a>
                <span style="position: relative; top: 2px;">Remove</span>
                <?php
                }
                ?>
                
            </div>
        </div>
        
    </div>
    
    <?php } ?>
    
    <div class="col-12">
        
        <div class="row no-gutters table-secondary">
            
            <div class="col-xs-12 col-sm-12 offset-md-8 col-md-4">
                
                <p class="mt-1"><strong><?php echo SUB_TITLE_SUB_TOTAL; ?></strong> <span class="ml-3"><?php echo $cartShowTotal; ?></span></p>
                
            </div>
            
        </div>
        
    </div>
    
</div><!-- END OF ROW FOR PRODUCT DISPALY -->

<!--bof shopping cart buttons-->
    <div class="col-12">
        <div class="row no-gutters">
            <div class="col-xs-6 col-sm-6 col-md-4 mt-2">
                <div><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT) . '</a>'; ?></div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 mt-2">
                <?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_CONTINUE_SHOPPING, BUTTON_CONTINUE_SHOPPING_ALT) . '</a>'; ?>
            </div>
<?php
// show update cart button
  if (SHOW_SHOPPING_CART_UPDATE == 2 or SHOW_SHOPPING_CART_UPDATE == 3) {
?>
            <div class="col-xs-6 col-sm-6 col-md-4 text-center mt-2">
                <div><?php echo zen_image_submit(ICON_IMAGE_UPDATE, ICON_UPDATE_ALT); ?></div>
            </div>
<?php
  } else { // don't show update button below cart
?>
<?php
  } // show update button
?>
<!--eof shopping cart buttons-->
        </div><!-- END OF INNER ROW NO-GUTTERS FOR BUTTONS -->
    </div><!-- END OF COL-12 WRAPPER FOR BOTTOM BUTTONS -->
</div><!-- END OF 3RD ROW NO-GUTTERS INSIDE FORM -->
</form>
</div> 
<!-- END OF FORM COL-12 WRAPPER -->

<?php
    if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '1') {
?>
<div class="col-12 mt-4 mb-4">
    <div class=""><?php echo '<a class="btn btn-secondary" href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_SHIPPING_ESTIMATOR) . '\')">' . 'Estimate Shipping' . '</a>'; ?></div>
</div>
<?php
    }
?>

<!-- ** BEGIN PAYPAL EXPRESS CHECKOUT ** -->
<?php  // the tpl_ec_button template only displays EC option if cart contents >0 and value >0
if (defined('MODULE_PAYMENT_PAYPALWPP_STATUS') && MODULE_PAYMENT_PAYPALWPP_STATUS == 'True') {
  include(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/tpl_ec_button.php');
}
?>
<!-- ** END PAYPAL EXPRESS CHECKOUT ** -->

<?php
      if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '2') {
/**
 * load the shipping estimator code if needed
 */
?>
      <?php require(DIR_WS_MODULES . zen_get_module_directory('shipping_estimator.php')); ?>

<?php
      }
?>
<?php
  } else {
?>

<h2 id="cartEmptyText"><?php echo TEXT_CART_EMPTY; ?></h2>

<?php
$show_display_shopping_cart_empty = $db->Execute(SQL_SHOW_SHOPPING_CART_EMPTY);

while (!$show_display_shopping_cart_empty->EOF) {
?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_UPCOMING') {
    include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
  }
?>
<?php
  $show_display_shopping_cart_empty->MoveNext();
} // !EOF
?>
<?php
  }
?>
</div>
<!-- END OF SHOPPING CART ROW -->

<!-- =================== End of Shopping Cart ==================== -->