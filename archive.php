<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myhome
 */

get_header();
?>
    <div class="breadcrumb archive-breadcrumb"><?php the_breadcrumb() ?></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main archive-page 1">
          <div class="container">
				
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						single_cat_title('<h2 class="page-title">', '</h2>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						
						?>
					</header><!-- .page-header -->
				<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
			    </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<section class="call">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Have a question? Call us <?php $tel = get_option('myhome_theme_options'); ?>
                <a href="tel:<?php echo $tel['text_tel'];?>">
                <?php echo $tel['text_tel'];?></a></p>
          </div>
        </div>
      </div>

    </section>	
<?php

get_footer();
