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
<div id="topbar">
  <div class="container">
    <div class="row bg-home">
      <div class="email col-md-4 col-sm-4">
        <?php if( get_theme_mod( 'vw_writer_blog_mail') != '') { ?>
          <div class="row">
            <div class="col-md-2"><i class="fas fa-envelope-open"></i></div>
            <div class="col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('vw_writer_blog_mail_text',__('DROP US A EMAIL','vw-writer-blog'))); ?></p>
              <p><?php echo esc_html( get_theme_mod('vw_writer_blog_mail',__('info@example.com','vw-writer-blog')) ); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="logo col-lg-4 col-md-4">
        <?php if( has_custom_logo() ){ vw_writer_blog_the_custom_logo();
          }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
          <p class="site-description"><?php echo esc_html($description); ?></p>
        <?php endif; } ?>
      </div>
      <div class="call col-md-4 col-sm-4">
        <?php if( get_theme_mod( 'vw_writer_blog_call' ) != '') { ?>
          <div class="row">
            <div class="col-md-10">
              <p class="infotext"><?php echo esc_html( get_theme_mod('vw_writer_blog_call_text',__('Any Questions? CALL US...','vw-writer-blog')) ); ?></p>
              <p><?php echo esc_html( get_theme_mod('vw_writer_blog_call',__('+91 968 923 9632','vw-writer-blog')) ); ?></p>
            </div>
            <div class="col-md-2"><i class="fas fa-phone"></i></div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>