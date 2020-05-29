<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_order_totals.php 2993 2006-02-08 07:14:52Z birdbrain $
 */
 ?>
<?php 
/**
 * Displays order-totals modules' output
 */
  for ($i=0; $i<$size; $i++) { ?>
    <div class="row">
        <?php if ($GLOBALS[$class]->output[$i]['title'] == "Total:") {?>
    <div class="col-12 bg-dark text-light mb-4" id="<?php echo str_replace('_', '', $GLOBALS[$class]->code); ?>">
        <?php } else {?>
    <div class="col-12 bg-light text-dark" style="border-bottom: solid 1px #eee;" id="<?php echo str_replace('_', '', $GLOBALS[$class]->code); ?>">
        <?php } ?>
        <div class="lineTitle larger d-inline-block"><?php echo $GLOBALS[$class]->output[$i]['title']; ?></div>
        <div class="totalBox larger d-inline-block"><strong><?php echo $GLOBALS[$class]->output[$i]['text']; ?></strong></div>
    </div>
    </div>
<?php } ?>
