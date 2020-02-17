<?php
/**
 * Template name: Home 
 */

get_header(); ?>

    <section class="header-home">
    
        <div class="header-home">
          <div class="header-slider">
            <div class="slide" style="background-image: url(<?php the_field('slide_1') ?>);"></div>
            <div class="slide" style="background-image: url(<?php the_field('slide_2') ?>);"></div>
            <div class="slide" style="background-image: url(<?php the_field('slide_3') ?>);"></div>
          </div>	
            <button class="slick-next slick-next-head slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-right.png"></button>
            <button class="slick-prev slick-prev-head slick-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/arrow-left.png"></button>
            <div class="slide slide-mob" style="background-image: url(<?php the_field('slide_1') ?>);"></div>
        <div class="slider-top">
        
          <div class="container">
              <div class="row">
            <div class="slide-content">
              <div class="slide-content_logo">
                <?php the_custom_logo(); ?>
              </div>
              <h1><?php the_field('main_title') ?></h1>
              <p class="slider-heading-text"> <?php the_field('main_subtitle') ?></p>
              <button class="video slider-heading-btn" data-toggle="modal" data-target="#slider-modal"><i class="fas fa-play-circle"></i> <p><?php pll_e('Watch Our Video'); ?></p></button>
                <div id="popup-header" class="popup-header">
                  <button type="button" class="close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                  </button>
                  <?php $tel = get_option('myhome_theme_options'); ?>
                 
                  <iframe class="iframe" src="<?php echo $tel['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="overlay"></div>
              <!-- </div> -->
              <form class="slider-form">
                <h3><?php pll_e('Check Availability'); ?></h3>
                <div class="form-group">
                  <div class="controls">
                      <input type="date" id="arrive" class="floatLabel" name="arrive" placeholder="Check-in" value="<?php echo date('Y-m-d'); ?>">
                      <label for="arrive" class="label-date">Check-in</label>
                  </div> 
                  <div class="controls">
                      <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />
                      <label for="depart" class="label-date">Check-out </label>
                  </div>
                  <div class="controls controls-select controls-room">
                
                  <select class="floatLabel select-room">
                    <option value="blank"></option>
                  
                      <?php $args = array('post_type' => 'room', 'posts_per_page' => -1);
                        $room = new WP_Query( $args ); // loop
                        if( $room -> have_posts() ) : ?>
                          <?php while( $room -> have_posts() ) :
                            $room -> the_post();
                         ?>
                      <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                          
                      <?php endwhile; 
                       endif;
                        wp_reset_postdata() ?>
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
                <a type="submit" class="header-form-btn"><?php pll_e('Search now'); ?></a>
                </div>    
               
              </form>
                    
            </div>
          </div>
          </div>
        </div>
      </div>	
    </section>
    <!-- <div>..<?php echo do_shortcode('[display-posts post_type = "room"]') ?></div> -->
	  <section class="about">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>
              <p class="heading-text"><?php pll_e('Welcome to'); ?></p>
              <p class="heading">My <span>home</span> </p>
              <p class="heading-after"><?php echo pll_e('Serviced Apartments'); ?></p>
            </h2>
            <div class="about-text">
            <?php
                        the_post();
                        the_content(); 
                    ?>
            
            </div>
            <h3><?php pll_e('Apartment prices starting from:'); ?></h3>
            <div class="about-prices">
              <div class="about-prices_box">
                <p class="about-prices_box-price"><?php echo do_shortcode('[wpcs_price value="'.get_field('price').'"]')?> </p>
                <p class="about-prices_box-span"><span>*</span><?php pll_e('per night for a'); ?></p>
                <h4><?php the_field('type')?></h4>
                <p class="about-prices_box-span_sm about-prices_box-span"><span>*</span><?php pll_e('staying over 30 nights'); ?></p>
                <a href="/myhome/reservations/" class="about-price_btn"><?php pll_e('Book now'); ?></a>
              </div>
              <div class="about-prices_box">
                <p class="about-prices_box-price"><?php echo do_shortcode('[wpcs_price value="'.get_field('price_2').'"]')?></p>
                <p class="about-prices_box-span"><span>*</span><?php pll_e('per night for a'); ?></p>
                <h4><?php the_field('type_2')?></h4>
                <p class="about-prices_box-span_sm about-prices_box-span"><span>*</span><?php pll_e('staying over 30 nights'); ?></p>
                <a href="/myhome/reservations/" class="about-price_btn"><?php pll_e('Book now'); ?></a>
              </div>
              <div class="about-prices_box">
                <p class="about-prices_box-price"><?php echo do_shortcode('[wpcs_price value="'.get_field('price_3').'"]')?></p>
                <p class="about-prices_box-span"><span>*</span><?php pll_e('per night for a'); ?></p>
                <h4><?php the_field('type_3')?></h4>
                <p class="about-prices_box-span_sm about-prices_box-span"><span>*</span><?php pll_e('staying over 30 nights'); ?></p>
                <a href="/myhome/reservations/" class="about-price_btn"><?php pll_e('Book now'); ?></a>
              </div>
              <div class="about-prices_box">
                <p class="about-prices_box-price"><?php echo do_shortcode('[wpcs_price value="'.get_field('price_4').'"]')?> </p>
                <p class="about-prices_box-span"><span>*</span><?php pll_e('per night for a'); ?></p>
                <h4><?php the_field('type_4')?></h4>
                <p class="about-prices_box-span_sm about-prices_box-span"><span>*</span><?php pll_e('staying over 30 nights'); ?></p>
                <a href="/myhome/reservations/" class="about-price_btn"><?php pll_e('Book now'); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
    <?php
          $args = array('post_type' => 'rooms' );

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
                        <a href="<?php the_permalink(); ?>" class="slider-rooms-btn"><?php pll_e('Check Availability'); ?></a>
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
        <p class="heading-text"><?php pll_e('Some motivational'); ?></p>
        <p class="heading"> <span><?php pll_e('Advantages'); ?></span> </p>
        <p class="heading-after"><?php pll_e('To stay with us'); ?></p>
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
            <p><?php pll_e('Have a question? Call us'); ?><?php $tel = get_option('myhome_theme_options'); ?>
                <a href="tel:<?php echo $tel['text_tel'];?>">
                <?php echo $tel['text_tel'];?></a></p>
          </div>
        </div>
      </div>

    </section>
    <section class="gallery">
      <div class="container-fluid">
        <div class="row">
          <div class="gallery-heading">
            <a href="/myhome/gallery/">
              <h2>
                <p class="heading-text"><?php pll_e('Gallery'); ?></p>
                
                <p class="heading-after"><?php pll_e('Make yourself comfortable'); ?></p>
              </h2>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="/myhome/gallery/" class="gallery-img">
            <div class="gallery-img_box">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="/myhome/gallery/" class="gallery-img">
              
              <div class="gallery-img_box gallery-img_box2">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 col-sm-6 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box3">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 col-sm-6 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box4">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box5">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box6">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box7">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
          <div class="col-md-3 d-md-block d-none">
            <a href="/myhome/gallery/" class="gallery-img">
              <div class="gallery-img_box gallery-img_box8">
                <div class="gal-overlay"></div>
              </div> 
            </a>
          </div>
        </div>
      </div>
      </a>
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
              <p class="special-text_green"><span><?php pll_e('From'); ?></span> <?php the_field('special_price')?></p>
              <p class="special-text_grey"><?php the_field('special_text')?></p>
                <a href="/myhome/reservations/" class="special-btn"><?php pll_e('Book now'); ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="videos" style="background-image:url(<?php the_field('video_background')?>);">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <a href="#" class="videos-btn video"><img alt="#" src="<?php bloginfo('template_url'); ?>/assets/img/arrow-right.png"></a>
            <p><?php the_field('video_button_text')?></p>
          </div>
        </div>
      </div>
    </section>
    <section class="tripadviser">
      <div class="container">
        <div class="row">
        <div id="TA_rated129" class="TA_rated">
          <ul id="0uPuNa" class="TA_links B6uR60LzHg">
          <li id="q1oGHQa" class="sY42s0SCB">
          <a target="_blank" href="https://www.tripadvisor.com/%22%3E<img 
          src="https://www.tripadvisor.com/img/cdsi/img2/badges/ollie-11424-2.gif" alt="TripAdvisor"/></a>
          </li>
          </ul>
          </div>
          <script async src="https://www.jscache.com/wejs?wtype=rated&amp;uniq=129&amp;locationId=2509356&amp;lang=en_US&amp;display_version=2" 
          data-loadtrk onload="this.loadtrk=true"></script>
        </div>
      </div>
    </section>	


<?php

get_footer();




