<?php
/**
 * Module Template - for shipping-estimator display
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_shipping_estimator.php 15881 2010-04-11 16:32:39Z wilt $
 */
?>
<div class="col-12 mt-3" id="shippingEstimatorContent">
<?php echo zen_draw_form('estimator', zen_href_link($show_in, '', $request_type), 'post'); ?>
<?php echo zen_draw_hidden_field('scid', $selected_shipping['id']); ?>
<?php
  if($_SESSION['cart']->count_contents()) {
    if ($_SESSION['customer_id']) {
?>
<h2 class="mt-2 mb-2"><?php echo CART_SHIPPING_OPTIONS; ?></h2>


<?php if (!empty($totalsDisplay)) { ?>
<div class="cartTotalsDisplay important"><?php echo $totalsDisplay; ?></div>
<?php } ?>

<?php
    // only display addresses if more than 1
      if ($addresses->RecordCount() > 1){
?>
<label class="inputLabel" for="seAddressPulldown"><?php echo CART_SHIPPING_METHOD_ADDRESS; ?></label>
<?php echo zen_draw_pull_down_menu('address_id', $addresses_array, $selected_address, 'onchange="return shipincart_submit();" id="seAddressPulldown"'); ?>
<?php
      }
?>

<div class="bold back" id="seShipTo"><?php echo CART_SHIPPING_METHOD_TO; ?></div>
<address class="back"><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?></address>
<br class="clearBoth" />
<?php
    } else {
?>
<h2><?php echo CART_SHIPPING_OPTIONS; ?></h2>
<?php if (!empty($totalsDisplay)) { ?>
<div class="cartTotalsDisplay important"><?php echo $totalsDisplay; ?></div>
<?php } ?>
<?php
      if($_SESSION['cart']->get_content_type() != 'virtual'){
?>
<div class="row no-gutters mt-2">
    <div class="col-2 mr-2">
        <label class="inputLabel" for="country"><?php echo ENTRY_COUNTRY; ?></label>
    </div>
    <div class="col-5">
        <?php echo zen_get_country_list('zone_country_id', $selected_country, 'id="country" onchange="update_zone(this.form);"'); ?>
    </div>
</div><!-- END OF COUNTRY ROW -->
<div class="row no-gutters mt-2">
    <div class="col-2 mr-2">
        <label class="inputLabel" for="stateZone" id="zoneLabel"><?php echo ENTRY_STATE; ?></label>
    </div>
    <div class="col-5">
        <?php echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $state_zone_id, 'id="stateZone"');?>
    </div>
</div><!-- END OF STATEZONE ROW -->
<span id="stBreak"></span>
<div class="row no-gutters mt-2">
    <div class="col-2 mr-2">
        <label class="inputLabel" for="state" id="stateLabel"><?php echo $state_field_label; ?></label>
    </div>
    <div class="col-5">
        <?php echo zen_draw_input_field('state', $selectedState, zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' id="state"') .'&nbsp;<span class="alert" id="stText">&nbsp;</span>'; ?>
    </div>
</div><!-- END OF STATE LABEL ROW -->

<?php
        if(CART_SHIPPING_METHOD_ZIP_REQUIRED == "true"){
?>
<div class="row no-gutters mt-2">
    <div class="col-2 mr-2">
        <label class="inputLabel"><?php echo ENTRY_POST_CODE; ?></label>
    </div>
    <div class="col-5">
        <?php echo  zen_draw_input_field('zip_code', $zip_code, 'size="7"'); ?>
    </div>
</div><!-- END OF ZIP CODE ROW -->

<?php
        }
?>
<div class="row no-gutters">
    <div class="col-2 mt-2 mb-2">
        <?php echo  zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
    </div>
</div><!-- END OF UPDATE SHIPPING EST BUTTON ROW -->
<?php
      }
    }
    if($_SESSION['cart']->get_content_type() == 'virtual'){
?>
<?php echo CART_SHIPPING_METHOD_FREE_TEXT .  ' ' . CART_SHIPPING_METHOD_ALL_DOWNLOADS; ?>
<?php
    }elseif ($free_shipping==1) {
?>
<?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)); ?>
<?php
    }else{
?>
<div class="table-responsive">
<table class="table">
<?php if ($_SESSION['customer_id'] < 1 ){ ?>
    <tr class="bg-success">
      <td colspan="2" class="text-center" style="color: #FFF;">
        <?php echo CART_SHIPPING_QUOTE_CRITERIA; ?><br />
        <?php echo '<span class="seDisplayedAddressInfo">' . zen_get_zone_name($selected_country, $state_zone_id, '') . ($selectedState != '' ? ' ' . $selectedState : '') . ' ' . $order->delivery['postcode'] . ' ' . zen_get_country_name($order->delivery['country_id']) . '</span>'; ?>
      </td>
    </tr>
<?php } ?>
     <tr>
       <th scope="col" id="seProductsHeading"><?php echo CART_SHIPPING_METHOD_TEXT; ?></th>
       <th scope="col" id="seTotalHeading"><?php echo CART_SHIPPING_METHOD_RATES; ?></th>
     </tr>
<?php
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
        if(sizeof($quotes[$i]['methods'])==1){
          // simple shipping method
          $thisquoteid = $quotes[$i]['id'].'_'.$quotes[$i]['methods'][0]['id'];
?>
     <tr class="<?php echo $extra; ?>">
<?php
          if($quotes[$i]['error']){
?>
         <td colspan="2"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['error']; ?>)</td>
       </tr>
<?php
          }else{
            if($selected_shipping['id'] == $thisquoteid){
?>
         <td class="bold text-left"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][0]['title']; ?>)</td>
         <td class="cartTotalDisplay bold text-left"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][0]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
            }else{
?>
          <td class="text-left"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][0]['title']; ?>)</td>
          <td class="cartTotalDisplay text-left"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][0]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
            }
          }
        } else {
          // shipping method with sub methods (multipickup)
          for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
            $thisquoteid = $quotes[$i]['id'].'_'.$quotes[$i]['methods'][$j]['id'];
?>
    <tr class="<?php echo $extra; ?>">
<?php
            if($quotes[$i]['error']){
?>
         <td colspan="2"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['error']; ?>)</td>
       </tr>
<?php
            }else{
              if($selected_shipping['id'] == $thisquoteid){
?>
         <td class="bold text-left"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][$j]['title']; ?>)</td>
         <td class="cartTotalDisplay bold text-left"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])); ?></td>
       </tr>
<?php
              }else{
?>
        <td class="text-center"><?php echo $quotes[$i]['module']; ?>&nbsp;(<?php echo $quotes[$i]['methods'][$j]['title']; ?>)</td>
        <td class="cartTotalDisplay text-left"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])); ?></td>
      </tr>
<?php
              }
            }
          }
        }
      }
?>
</table>
</div><!-- END OF TABLE-RESPONSIVE DIV -->
<?php
   }
  }
?>
</form>
</div><!-- END OF SHIPPING EST COL-12 -->