<?php
/**
 * Template name: Gallery 
 */

get_header(); ?>
<div id="primary" class="home content-area">
		<main id="main" class="site-main">
 
    <div class="breadcrumb"><?php the_breadcrumb() ?></div>
    <section class="content-part content-gallery">
        <div class="container-fluid">
            <div class="row">
                    <?php if(have_posts()){ while (have_posts()) {the_post(); ?>
                        <?php $images = acf_photo_gallery('gallery_page', $post->ID); if(count($images)): ?>
                        <?php foreach($images as $image): ?>
                        <div class="col-md-3 col-6">
                          <div class="gallery-box">
                            <a class="gallery-box_link" data-fancybox="gallery" href="<?php echo $image['full_image_url']; ?>">
                              <!-- <img src="<?php echo $image['full_image_url']; ?>"> -->
                              <div class="gallery-box_img" style="background-image:url(<?php echo $image['full_image_url']; ?>);">
                               <div class="icon">+</div>
                              </div>
                            </a>
                          </div>
                        </div> 
                         
                        <?php endforeach; ?>
                        <?php endif; ?>
                    <?php } ?>
                    <?php } ?>   
              
            </div>
        </div>
    </section>

    <section class="special">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="special-img" style="background-image: url(<?php the_field('special_img')?>);">
              <img alt="" src="<?php the_field('special_icon')?>">
              <h5><?php the_field('special_image_title')?></h5>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="special-text">
              <h5><?php the_field('special_title')?></h5>
              <p class="special-text_green"><span>From</span> <?php the_field('special_price')?></p>
              <p class="special-text_grey"><?php the_field('special_text')?></p>
                <a href="/myhome/reservations/" class="special-btn">Book now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="rooms">
      <div class="slider-rooms" id="slider">
        <?php $args = array('post_type' => 'room', 
          'posts_per_page' => -1,);
            $book = new WP_Query( $args ); // loop
            if( $book->have_posts() ) : ?>
              <?php while( $book->have_posts() ) :
                $book->the_post();
            ?>
            <div class="slider-rooms_item">
              <div class="slider-rooms_box" style=" background-image: url(<?php the_field('image_for_slide')?>);">
                  <div class="slider-rooms_box-content">
                  <p><?php the_title(); ?></p>
                  <div class="slider-rooms_box-inner">
                      <span><?php the_field('floor') ?></span>
                      <div class="slider-rooms_box-lists">
                          <?php
                          $fac = get_field('facilities');
                          if( $fac ): ?>
                          <ul class="slider-rooms_box-list">
                            <?php foreach( $fac as $fac ): ?>
                              <li><?php echo $fac; ?></li>
                            <?php endforeach; ?>
                          </ul>
                          <div class="slider-rooms_box-person"><?php the_field('person') ?></div>
                      </div>
                      <div class="slider-rooms-link">
                        <a href="<?php the_permalink(); ?>" class="slider-rooms-btn">Check availability</a>
                      </div>
                          
                    
                  </div>
              </div>
            </div>
            <?php endif; ?>
                <!-- <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?> -->
              </div>
        <?php endwhile; ?>
            <?php endif;
              wp_reset_postdata() ?>
      </div>
      <button class="slick-next slick-next-room slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-rightb.png"></button>
      <button class="slick-next slick-next-room custom-next"><img src="<?php bloginfo('template_url'); ?>/assets/img/right-arrow.png"></button>
      <button class="slick-prev slick-prev-room slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-leftb.png"></button>
      <button class="slick-prev slick-prev-room custom-prev"><img src="<?php bloginfo('template_url'); ?>/assets/img/left-arrow.png"></button>
    </section>

    <section class="advantages">
      <h2>
        <p class="heading-text">Some motivational</p>
        <p class="heading"> <span>Advantages</span> </p>
        <p class="heading-after">To stay with us</p>
      </h2>
     
      <div class="advantages-slider">

        <?php
          $args = array('post_type' => 'advantage', 'post_per_page' => 8 );

          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();?>
          <div class="advantages-slider-item">
          <div class="advantage-slider_icon">

          <?php the_post_thumbnail();?></div>
          <h5> <?php
          the_title(); ?></h5> 
          <?php
          the_content();?>
          </div>  
        
        <?php endwhile;?>
      </div>
      <button class="slick-next next-adv slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-rightb.png"></button>
      <button class="slick-prev prev-adv slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-leftb.png"></button>
    </section>
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



</div>
</div>

<?php


get_footer();
