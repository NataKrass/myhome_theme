<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myhome
 */

?>

<div class="col-md-6 col-12">	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header category-post">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				myhome_posted_on();
				myhome_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="archive-category_link">
		<div class="overlay-box"></div>
	  <?php myhome_post_thumbnail(); ?>
    
        <div class="slider-price"><p><?php the_field('price') ?></p><span> <?php the_field('price_for') ?></span> </div>
	</div>
	<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'myhome' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'myhome' ),
					'after'  => '</div>',
				) );
				?>
			
						
						
	    </div><!-- .entry-content -->
		<a href="<?php the_permalink(); ?>" class="single-btn">Book this room</a>
	
</article><!-- #post-<?php the_ID(); ?> -->
</div>