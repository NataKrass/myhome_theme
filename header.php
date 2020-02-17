<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myhome
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->
 
  <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
      <div class="top-nav">
          <div class="container">
            <div class="row">
             <div class="top-nav_list">
              <div class="top-nav_li">
               
                  <i class="far fa-money-bill-alt"></i>
                  <?php echo do_shortcode('[wpcs show_flags=0 width="300px" txt_type="desc"]') ?>
                <!-- <select>
                  <option>EURO</option>
                  <option>USD</option>
                </select> -->
              </div>
              <div class="top-nav_li top-nav_tel">
               <?php $tel = get_option('myhome_theme_options'); ?>
                <a href="tel:<?php echo $tel['text_tel'];?>"><i class="fas fa-phone-alt"></i>
                <?php echo $tel['text_tel'];?></a>
              </div>
              <div class="top-nav_li top-nav_lang">
              <ul class="lang-flags"><?php pll_the_languages( array( 'show_flags' => 1, 'show_names' => 0, 'dropdown' => 0, ) ); ?></ul>
              <?php pll_the_languages( array( 'dropdown' => 1, 'show_flags' => 1 ) ); ?>
             
                  
              </div>
              <ul class="top-nav_li top-nav_soc">
                <li><a href="<?php $fb = get_option('myhome_theme_options'); echo $fb['text_fb'];?>" class="top-nav_soc-fb"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?php $li = get_option('myhome_theme_options'); echo $li['text_li'];?>"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="main-nav">
          <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-8 col-10">
                  <div class="logo">
                  <?php
                    the_custom_logo();
                    ?>
                  </div>
                </div>
                <div class="col-lg-10 col-md-4 col-2">
                  <div class="menu menu-collaps d-lg-block navigation" id="nav">
				            <?php
                      wp_nav_menu( array(
                        'theme_location' => 'menu',
                        'menu_id'        => 'primary-menu',
                      ) );
                    ?>
                  </div>
                  <!-- mobile -->
            <div class="d-lg-none">
             <div class="mobile">
               <div class="head-humburger rounded float-right d-flex d-lg-none">
                <a href="#" id="show">
                  <button class="toggle-hamburger toggle-hamburger__animx">
                    <span>menu toggle</span>
                  </button>
                </a>
               </div> 
             </div>
               </div>  
           <!-- end -->
                </div>
               
            </div>
          </div>
        </div>

        <section class="header-home header-inner">
        <div class="header-home">
          <div class="header-page">
            <!-- <div class="header-page_bg">
                <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail();
                }?>          
            </div> -->
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div id="post" class="header-page_bg" style="background-image: url('<?php echo $thumb['0'];?>')">
              <p></p>
            </div>
          </div>	
          
        
        <div class="slider-top slider-top_inner">
        
          <div class="container">
              <div class="row">
            <div class="slide-content slide-content_inner">
              
              <h1 class="inner-page_heading"><?php the_title(); ?></h1>
              <p class="inner-page_heading-text"><?php pll_e('All features and services'); ?></p>
              <button class="video slider-heading-btn slider-heading-btn_inner" data-toggle="modal" data-target="#slider-modal"><i class="fas fa-play-circle"></i> <p><?php pll_e('Watch Our Video'); ?></p></button>
                <div id="popup-header" class="popup-header">
                  <button type="button" class="close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                  </button>
                  
                  <iframe class="iframe gg" src="<?php echo $tel['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="overlay"></div>
              <!-- </div> -->
            
                        
            </div>
          </div>
          </div>
        </div>
      </div>	
    </section>
  
        <div id="content" class="site-content">