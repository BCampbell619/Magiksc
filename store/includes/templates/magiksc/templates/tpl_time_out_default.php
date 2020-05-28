<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_time_out_default.php 6620 2007-07-17 05:52:19Z drbyte $
 */
?>
<div class="row" id="timeoutDefault">
    <div class="col-12">
<?php
    if ($_SESSION['customer_id']) {
?>
<h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE_LOGGED_IN; ?></h1>
<div id="timeoutDefaultContent" class="content"><?php echo TEXT_INFORMATION_LOGGED_IN; ?></div>
<?php
  } else {
?>
<h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="timeoutDefaultContent" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>
<fieldset>
<legend><?php echo HEADING_RETURNING_CUSTOMER; ?></legend>
<div class="row mt-2 mb-4">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
        <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address"'); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
        <?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password') . ' id="login-password"'); ?>
        <?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>
    </div>
</div><!-- END OF INNER FORM ROW -->
</fieldset>

<div class="row">
    <div class="col-12 clearfix">
    <div class="float-left"><?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?></div>
    <div class="float-right"><?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?></div>
    </div><!-- END OF CLEAR FIX -->
</div><!-- END OF FORM BUTTON ROW -->
</form>
<?php
 }
 ?>
    </div><!-- END OF COL-12 WRAPPER -->
</div><!-- END OF TIME OUT DEFAULT ROW -->
