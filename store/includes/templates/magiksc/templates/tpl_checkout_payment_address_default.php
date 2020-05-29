<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_payment_address.<br />
 * Allows customer to change the billing address.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_payment_address_default.php 4852 2006-10-28 06:47:45Z drbyte $
 */
?>
<div class="row" id="checkoutPayAddressDefault">
    <div class="col-12">
<?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), 'post', 'onsubmit="return check_form_optional(checkout_address);"'); ?>

<h1 id="checkoutPayAddressDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('checkout_address') > 0) echo $messageStack->output('checkout_address'); ?>

<h2 id="checkoutPayAddressDefaultAddress"><?php echo TITLE_PAYMENT_ADDRESS; ?></h2>

<p><?php echo TEXT_SELECTED_PAYMENT_DESTINATION; ?></p>
<address><strong><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['billto'], true, ' ', '<br />'); ?></strong></address>

<?php
     if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
?>
<?php
/**
 * require template to collect address details
 */
 require($template->get_template_dir('tpl_modules_checkout_new_address.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_new_address.php');
?>
<?php
    }
    if ($addresses_count > 1) {
?>

<fieldset>
<legend><?php echo TABLE_HEADING_NEW_PAYMENT_ADDRESS; ?></legend>
<?php
      require($template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_address_book.php');
?>
</fieldset>
<?php
     }
?>

<div class="row">
    <div class="col-12 clearfix mt-2 mb-4">
        <div class="float-left"><?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?></div>
        <div class="float-left mt-2 ml-2"><small><?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?></small></div>

<?php
  if ($process == true) {
?>
        <div class="float-right"><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  }
?>
    </div>
</div>
</form>
    </div> <!-- END OF CHECKOUT PAYMENT ADDRESS DEFAULT COL WRAPPER -->
</div><!-- END OF CHECKOUT PAYMENT ADDRESS DEFAULT ROW -->