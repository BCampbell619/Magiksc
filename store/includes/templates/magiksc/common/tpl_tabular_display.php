<?php
/**
 * Common Template - tpl_tabular_display.php
 *
 * This file is used for generating tabular output where needed, based on the supplied array of table-cell contents.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Drbyte Sun Jan 7 21:28:50 2018 -0500 Modified in v1.5.6 $
 */

$zco_notifier->notify('NOTIFY_TPL_TABULAR_DISPLAY_START', $current_page_base, $list_box_contents);

//print_r($list_box_contents);
  $cell_scope = (!isset($cell_scope) || empty($cell_scope)) ? 'col' : $cell_scope;
  $cell_title = (!isset($cell_title) || empty($cell_title)) ? 'list' : $cell_title;
/*echo "<pre>";
print_r($list_box_contents);
echo "</pre>";*/
?>

<div class="row justify-content-end">
    <div class="prodSort col-xs-3 col-sm-3 col-md-3 col-lg-3">
<?php 
    echo "\t\t\t" . $list_box_contents[0][1]['text'] . "\n";
    echo "\t\t\t" . $list_box_contents[0][2]['text'] . "\n";     
?>
    </div>
</div>
<div id="wrapper_products" class="row">
<?php for ($i = 1; $i < count($list_box_contents); $i++) { ?>
    
        <div class="magikProducts col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <?php //echo str_replace('width="67" height="80"', 'width="201" height="240"',$list_box_contents[$i][0]['text']); ?>
            <?php 
                                                    
                $findImgSizes = explode(" ", $list_box_contents[$i][0]['text']);
                                                    
                for ($l = 0; $l < count($findImgSizes); $l++) {
                    
                    if (stristr($findImgSizes[$l], "width")) {
                        
                        $splitWidth = explode("=", $findImgSizes[$l]);
                        $widthValue = str_replace('"', '', $splitWidth[1]);
                        $fullWidth = $widthValue * 4;
                        $rtnWidth = $splitWidth[0] . '="' . $fullWidth . '"';
                        $findImgSizes[$l] = $rtnWidth;
                        
                    } else if (stristr($findImgSizes[$l], "height")) {
                        
                        $splitHeight = explode("=", $findImgSizes[$l]);
                        $heightValue = str_replace('"', "",$splitHeight[1]);
                        $fullHeight = $heightValue * 4;
                        $rtnHeight = $splitHeight[0] . '="' . $fullHeight . '"';
                        $findImgSizes[$l] = $rtnHeight;
                        
                    }
                    
                }
                                                    
                $rtn =  implode(" ", $findImgSizes);
                                                    
                echo $rtn;
                                                    
            ?><br>
            <div class="magikProdText">
                <?php echo $list_box_contents[$i][1]['text']."\n"; ?>
                <?php echo $list_box_contents[$i][2]['text']."\n"; ?>
            </div>
        </div>
    
<?php } ?>
</div> <!-- end of row for products -->
<!-- <table id="<?php //echo 'cat' . $cPath . 'Table'; ?>" class="tabTable"> -->
<?php
  /*for($row=0, $n=sizeof($list_box_contents); $row<$n; $row++) {
    $r_params = "";
    $c_params = "";
    if (isset($list_box_contents[$row]['params'])) $r_params .= ' ' . $list_box_contents[$row]['params'];*/
?>
  <!--<tr <?php /*echo $r_params;*/ ?>>-->
<?php
    /*for($col=0, $j=sizeof($list_box_contents[$row]); $col<$j; $col++) {
      $c_params = "";
      $cell_type = ($row==0) ? 'th' : 'td';
      if (isset($list_box_contents[$row][$col]['params'])) $c_params .= ' ' . $list_box_contents[$row][$col]['params'];
      if (isset($list_box_contents[$row][$col]['align']) && $list_box_contents[$row][$col]['align'] != '') $c_params .= ' align="' . $list_box_contents[$row][$col]['align'] . '"';
      if ($cell_type=='th') $c_params .= ' scope="' . $cell_scope . '" id="' . $cell_title . 'Cell' . $row . '-' . $col.'"';
      if (isset($list_box_contents[$row][$col]['text'])) {*/
?>
   <?php /*echo '<' . $cell_type . $c_params . '>'; ?><?php echo $list_box_contents[$row][$col]['text'] ?><?php echo '</' . $cell_type . '>'  . "\n";*/ ?>
<?php
      /*}
    }*/
?>
  <!--</tr>-->
<?php
  /*}*/
?>
<!--</table>-->
<?php
$zco_notifier->notify('NOTIFY_TPL_TABULAR_DISPLAY_END', $current_page_base, $list_box_contents);
