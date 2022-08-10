<?php 

//Salient Specific functions
get_header(); 
nectar_page_header($post->ID); 
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
//Page-specific CSS
?>		
<style>
<?php 
include_once( plugin_dir_path( __FILE__ ) . 'style/style-archive-CUSTOM-POST-TYPE.css');
?>
</style>

<?php 
//Load page bars from templates
include_once( plugin_dir_path( __FILE__ ) . 'template-parts/subnav.php');
include_once( plugin_dir_path( __FILE__ ) . 'template-parts/titlebar.php');
include_once( plugin_dir_path( __FILE__ ) . 'template-parts/mainmenu.php');

//Assets
global $PLUGIN_TEMPLATE_dir;
$spinner_path = plugins_url( 'images/spinner.gif', __FILE__ );
//Page Data
$page_title = 'PAGE TITLE';
$page_color = '#5f8fb4';
$args = array('page' => 'PAGE TITLE');

?>
<div class="container-wrap" style="padding-top: 0px !important;">
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		<div class="row">
			
			<?php 			
			echo do_shortcode(add_subnav());
			echo do_shortcode(add_titlebar($page_title, $page_color));
			echo do_shortcode(add_mainmenu($page_title));
			echo '<div id="PAGE-TITLE_loading" style="padding-bottom: 35px;"><img src="'.$spinner_path.'" style="float: left; max-width: 48px; padding-right: 5px;"><h6 style="float: left; padding-top: 8px;">loading PAGE-TITLE...</h6></div><div class="clear" style="padding-bottom:0px;"></div>';
			echo '<div id="PAGE-TITLE_filtering" style="padding-bottom: 10px; display: none;"><img src="'.$spinner_path.'" style="float: left; max-width: 48px; padding-right: 5px;"><h6 style="float: left; padding-top: 8px;">filtering view...</h6></div><div class="clear" style="padding-bottom:0px;"></div>';
			echo '<div id="PAGE-TITLE_searching" style="padding-bottom: 10px; display: none;"><img src="'.$spinner_path.'" style="float: left; max-width: 48px; padding-right: 5px;"><h6 style="float: left; padding-top: 8px;">searching...</h6></div><div class="clear" style="padding-bottom:0px;"></div>';
			?>
			
<!-- Salient Specific Footer functions -->
			<?php if($page_full_screen_rows == 'on') echo '</div>'; ?>

		</div><!--/row-->
	</div><!--/container-->
</div><!--/container-wrap-->

<?php get_footer(); ?>
