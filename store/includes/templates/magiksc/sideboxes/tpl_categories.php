<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Drbyte Sun Jan 7 21:28:50 2018 -0500 Modified in v1.5.6 $
 */
  $content = "";

/*echo "<pre>";
print_r($check_categories);
echo "</pre>";*/
/*echo "<pre>";
print_r($box_categories_array);
echo "</pre>";*/

$connection = mysqli_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD,DB_DATABASE);

  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";
  for ($i=0, $j=sizeof($box_categories_array);$i<$j;$i++) {
    switch(true) {
// to make a specific category stand out define a new class in the stylesheet example: A.category-holiday
// uncomment the select below and set the cPath=3 to the cPath= your_categories_id
// many variations of this can be done
//      case ($box_categories_array[$i]['path'] == 'cPath=3'):
//        $new_style = 'category-holiday';
//        break;
      case ($box_categories_array[$i]['top'] == 'true'):
        $new_style = 'category-top';
        break;
      case ($box_categories_array[$i]['has_sub_cat']):
        $new_style = 'category-subs';
        break;
      default:
        $new_style = 'category-products';
      }
      
      $idArr = explode("=",$box_categories_array[$i]['path']);
      $id = $idArr[1];

      //If a top category has sub categories then set the new style to 'category-subs'
      
     if($box_categories_array[$i]['top'] == 'true' && $box_categories_array[$i]['has_sub_cat']) { $new_style = 'category-subs'; }

     if (zen_get_product_types_to_category($box_categories_array[$i]['path']) == 3 or ($box_categories_array[$i]['top'] != 'true' and SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS != 1)) {
        // skip if this is for the document box (==3)
      } else {
         
         //If current is false and does not have a sub category then set the anchor content

      if (!$box_categories_array[$i]['current'] && !$box_categories_array[$i]['has_sub_cat']) {
          
          $content .= '<a class="' . $new_style . '" id="'. $id.'" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';
          
          
          //If current is false and the top category has sub categories then set the anchor content
          
      } else if (!$box_categories_array[$i]['current'] && $box_categories_array[$i]['has_sub_cat']) {
          
          $content .= '<a class="' . $new_style . '" id="'. $id.'" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';
          
          //$content .= '<span class="category-subs-parent">' . $box_categories_array[$i]['name'] . '</span>';
          
          //If current is true and there is no sub-category and the path string length is equal to 7 then set the anchor content
          
      } else if ($box_categories_array[$i]['current'] && !$box_categories_array[$i]['has_sub_cat'] && strlen($box_categories_array[$i]['path']) == 7) {
          
          $content .= '<a class="' . $new_style . ' active"'.'" id="'. $id.'" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';
          
          //$content .= '<span class="category-subs-parent">' . $box_categories_array[$i]['name'] . '</span>';
          
          //If current is true and it has a sub-category, then set parent anchor and span content
          
      } else if ($box_categories_array[$i]['current'] && $box_categories_array[$i]['has_sub_cat']) {
          
          $content .= '<a class="parent-active" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';
          $content .= '<span class="category-subs-parent">' . $box_categories_array[$i]['name'] . '</span>';
          //$content .= '<span class="category-subs-selected">' . $box_categories_array[$i]['name'] . '</span>';
          
          //If current is true and sub-cat is false and length of path is > 7, then set the anchor content
          
      } else if ($box_categories_array[$i]['current'] && !$box_categories_array[$i]['has_sub_cat'] && strlen($box_categories_array[$i]['path']) > 7) {
          
          $content .= '<a class="sub-active" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';
          
      }
         
         //if current is true then check if sub categories is false
    
         if($box_categories_array[$i]['current']) {
             
             if (!$box_categories_array[$i]['has_sub_cat'] && strlen($box_categories_array[$i]['path']) > 7) {
                 
                 if (substr($box_categories_array[$i]['name'], 0, 6) == '&nbsp;') {
                 
                     $content .= '<span class="category-subs-selected">' . substr($box_categories_array[$i]['name'], 20, 39) . '</span>';
                 
                 } else {
                
                     $content .= '<span class="category-subs-selected">' . $box_categories_array[$i]['name'] . '</span>';
                 
                 }
                 
             } else if (!$box_categories_array[$i]['has_sub_cat'] && strlen($box_categories_array[$i]['path']) == 7) {
                 
                 $content .= $box_categories_array[$i]['name'];
                 
             }
             
         } else {
             if (substr($box_categories_array[$i]['name'], 0, 6) == '&nbsp;') {
                 
                $content .= substr($box_categories_array[$i]['name'], 20);
                 
             } else {
                
                 $content .= $box_categories_array[$i]['name'];
                 
             }
             
         }

      /*if ($box_categories_array[$i]['has_sub_cat']) {
        $content .= CATEGORIES_SEPARATOR; // This is found in the configuration table in the database
      }*/
      $content .= '</a>';

      if (SHOW_COUNTS == 'true') {
        if ((CATEGORIES_COUNT_ZERO == '1' and $box_categories_array[$i]['count'] == 0) or $box_categories_array[$i]['count'] >= 1) {
          $content .= CATEGORIES_COUNT_PREFIX . $box_categories_array[$i]['count'] . CATEGORIES_COUNT_SUFFIX;
        }
      }

         /*
          *
          * SHOW_COUNTS, CATEGORIES_COUNT_ZERO, CATEGORIES_COUNT_PREFIX, & CATEGORIES_COUNT_SUFFIX are all in the configuration table in the database
          *
          */
         
      $content .= "\n";
    }
  }

  if (SHOW_CATEGORIES_BOX_SPECIALS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true' or SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
// display a separator between categories and links
// SHOW_CATEGORIES_BOX_SPECIALS, SHOW_CATEGORIES_BOX_PRODUCTS_NEW, SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS, SHOW_CATEGORIES_BOX_PRODUCTS_ALL, & SHOW_CATEGORIES_SEPARATOR_LINK are all in the configuration table in the database
    if (SHOW_CATEGORIES_SEPARATOR_LINK == '1') {
      $content .= '<hr id="catBoxDivider" />' . "\n";
    }
    if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
      $show_this = $db->Execute("select s.products_id from " . TABLE_SPECIALS . " s where s.status= 1 limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS . '</a>' . '<br />' . "\n";
      }
    }
      
// FILENAME_SPECIALS is defined in includes/filenames.php and CATEGORIES_BOX_HEADING_SPECIALS is defined in includes/languages/english.php
      
    if (SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true') {
      // display limits
//      $display_limit = zen_get_products_new_timelimit();
      $display_limit = zen_get_new_date_range();

      $show_this = $db->Execute("select p.products_id
                                 from " . TABLE_PRODUCTS . " p
                                 where p.products_status = 1 " . $display_limit . " limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW . '</a>' . '<br />' . "\n";
      }
    }
      
// FILENAME_PRODUCTS_NEW is defined in includes/filenames.php and CATEGORIES_BOX_HEADING_WHATS_NEW is defined in includes/languages/english.php
      
    if (SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true') {
      $show_this = $db->Execute("select products_id from " . TABLE_FEATURED . " where status= 1 limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_FEATURED_PRODUCTS) . '">' . CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS . '</a>' . '<br />' . "\n";
      }
    }
      
// FILENAME_FEATURED_PRODUCTS is defined in includes/filenames.php and CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS is defined in includes/languages/english.php
      
    if (SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
      $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_ALL) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_ALL . '</a>' . "\n";
    }
  }
  $content .= '</div>';

// FILENAME_PRODUCTS_ALL is defined in includes/filenames.php and CATEGORIES_BOX_HEADING_PRODUCTS_ALL is defined in includes/languages/english.php