<?php
/**
 * The template part for header
 *
 * @package VW Writer Blog 
 * @subpackage vw_writer_blog
 * @since VW Writer Blog 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-writer-blog'); ?></a></div>
<div id="header" class="menubar">
	<div class="container">
		<div class="nav">
			<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
		</div>
	</div>
</div>