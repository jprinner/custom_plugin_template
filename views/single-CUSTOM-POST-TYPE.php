<?php 
// Salient Specific functions
get_header();
//nectar_page_header($post->ID); 
//full page
//$fp_options = nectar_get_full_page_options();
//extract($fp_options);
//Page-specific CSS
?>		
<style>
<?php 
include_once( plugin_dir_path( __FILE__ ) . 'style/style-single-CUSTOM-POST-TYPE.css');
?>
</style>


<?php 
//Load page bars
include_once( plugin_dir_path( __FILE__ ) . 'subnav.php');
include_once( plugin_dir_path( __FILE__ ) . 'titlebar.php');

//Page Data
$page_title = 'PAGE TITLE';
$page_color = '#5f8fb4';
$mode = "PAGE TITLE";
$back_button_slug = "/PAGE-TITLE";
$back_button_text = "Back to PAGE TITLE";
?>

<div class="container-wrap">
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		<div class="row">
		<?php 
			
		if(have_posts()) : while(have_posts()) : the_post();
			//$title = get_the_title();
			$post_id = get_the_ID();
			
			echo do_shortcode(add_subnav());
			echo do_shortcode(add_titlebar($page_title, $page_color));
			//Do post stuff here
			endwhile; endif;
			?>
			
			
			<?php if($page_full_screen_rows == 'on') echo '</div>'; ?>

		</div><!--/row-->
	</div><!--/container-->
</div><!--/container-wrap-->

<?php get_footer(); ?>