<?php
/**
 * Template name: Contact
 */

get_header(); ?>
<div id="primary" class="home content-area">
		<main id="main" class="site-main">
 
    <div class="breadcrumb"><?php the_breadcrumb() ?></div>

   
   

 
  
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




</div>
</div>

<?php


get_footer();
