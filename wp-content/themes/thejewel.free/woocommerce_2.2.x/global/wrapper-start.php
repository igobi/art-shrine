<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @version 2.1.0
 */
 
$is_full_width = (bool)( yit_get_sidebar_layout() == 'sidebar-no' || is_product() && yit_product_layout() == 'layout-1' );
 
?>
	        <!-- START CONTENT -->
	        <div id="content-shop" class="span<?php echo $is_full_width ? 12 : 9 ?> content group">