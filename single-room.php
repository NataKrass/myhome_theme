<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package myhome
 */

get_header();
?>
	

    <div class="breadcrumb"><?php the_breadcrumb() ?></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main single-flat">
			<div class="container">
			  <div class="row">
          <div class="col-12">
            <form class="slider-form">
              <h3>Check Availability</h3>
              <div class="form-group">
              <div class="controls">
                <input type="date" id="arrive" class="floatLabel" name="arrive" placeholder="Check-in" value="<?php echo date('yyyy-MM-dd'); ?>">
                <label for="arrive" class="label-date">Check-in</label>
              </div> 
              <div class="controls">
                <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('yyyy-MM-dd'); ?>" />
                <label for="depart" class="label-date">Check-out </label>
              </div>
              <div class="controls controls-select">
              
              <select class="floatLabel select-room">
                <option value="blank"></option>
                <option value="deluxe">Single</option>
                <option value="Zuri-zimmer">Premium</option>
                <option value="Zuri-zimmer">Double</option>
                <option value="Zuri-zimmer">Executive</option>
              </select>
              <label for="fruit">Room</label>
              </div>  
              <div class="controls controls-select">
                      
                <select class="floatLabel select-people">
                        <option value="blank"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>
                <label for="fruit">Guests</label>
              </div>   
              <button type="submit" value="Submit" class="">Search now</button>
              </div>    
          
            </form>
          </div>
			  </div>
			  <div class="row">
			  	<div class="col-lg-9">
				    <div class="slider-part">
              <div class="slider-for">
                <?php if(have_posts()){ while (have_posts()) {the_post(); ?>
                  <?php $images = acf_photo_gallery('gallery', $post->ID); if(count($images)): ?>
                  <?php foreach($images as $image): ?>
                    <div class="room-slider_for"style="background-image:url(<?php echo $image['full_image_url']; ?>)">
                      <div class="slider-price"><p><?php echo do_shortcode('[wpcs_price value="'.get_field('price').'"]')?></p><span> <?php the_field('price_for') ?></span> </div>
                    </div>
                    
                  <?php endforeach; ?>
                <?php endif; ?>
                <?php } ?>
                <?php } ?>
              </div>
              <button class="slick-next next-for slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-right.png"></button>
              <button class="slick-prev prev-for slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-left.png"></button>
              <div class="room-slider">
                <?php if(have_posts()){ while (have_posts()) {the_post(); ?>
                  <?php $images = acf_photo_gallery('gallery', $post->ID); if(count($images)): ?>
                  <?php foreach($images as $image): ?>
                    <div class="room-slider_item" style="background-image:url(<?php echo $image['full_image_url']; ?>)"></div>
                  
                  <?php endforeach; ?>
                  <?php endif; ?>
                <?php } ?>
                <?php } ?>
                
              </div>
            </div>
				    
			        <div class="content-part">
                <?php
                  the_post();
                  the_content(); 
                ?>
              </div>
                    <div class="club">
                      <p><?php the_field('club') ?></p>
                      <ul>
                        <li>
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                   
          </div>
          <div class="col-lg-3">
          <a href="#" class="single-btn">Book this room</a>
       
					<div class="servises">
            <h5 class="single_servises-included">Services Included</h5>
					  <?php
						$colors = get_field('servises');
						if( $colors ): ?>
						<ul class="single-servises">
							<?php foreach( $colors as $color ): ?>
								<li><?php echo $color; ?></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
                    <?php get_sidebar();?>
                </div>
			  </div>
		
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
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
	<!--  -->
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
          $args = array('post_type' => 'advantage' );

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
          <?php wp_reset_postdata(); ?>
        <?php endwhile;
      ?>
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
			
			  
			   

			<?php
get_sidebar();
get_footer();
