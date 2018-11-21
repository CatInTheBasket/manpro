<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_writer_blog_before_slider' ); ?>

<?php if( get_theme_mod( 'vw_writer_blog_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_writer_blog_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <span class="slider-date"><?php the_date(); ?></span>
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">              
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-writer-blog'); ?></a><i class="fas fa-long-arrow-alt-right"></i>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section>

<?php } ?>

<?php do_action( 'vw_writer_blog_after_slider' ); ?>

<section id="articles">
  <div class="container">
    <?php if( get_theme_mod('vw_writer_blog_section_title') != ''){ ?>
      <h3><i class="fas fa-edit"></i><?php echo esc_html(get_theme_mod('vw_writer_blog_section_title',__('MY FEATURED ARTICLES','vw-writer-blog'))); ?></h3>
    <?php }?>
    <div class="row">
      <?php
        $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('vw_writer_blog_featured_articles'),'theblog'))); ?>      
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="col-md-3 col-sm-3">
            <div class="box <?php  if(has_post_thumbnail()) {  } else { echo 'bg-color'; }?>" >
              <?php  if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
              <div class="box-content">
                <h4><?php the_title(); ?></h4>
                <i class="fas fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
                <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-writer-blog'), __('0 Comments', 'vw-writer-blog'), __('% Comments', 'vw-writer-blog') ); ?> </span>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_writer_blog_string_limit_words( $excerpt,15 ) ); ?></p>
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-writer-blog') ?></a><i class="fas fa-long-arrow-alt-right"></i>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php do_action( 'vw_writer_blog_after_articles' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>