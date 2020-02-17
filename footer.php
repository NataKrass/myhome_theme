<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myhome
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	  <section class="contact">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="contact-adress">
              <ul>
                <li>
                  <i class="fas fa-mobile-alt"></i>
                  <?php $tel = get_option('myhome_theme_options'); ?>
                <a href="tel:<?php echo $tel['text_tel'];?>">
                <?php echo $tel['text_tel'];?></a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  <a href="#"> <?php $adress = get_option('myhome_theme_options'); echo $adress['text_adress'];
                  ?></a>
                </li>
                <li>
                  <i class="fas fa-pencil-alt"></i>
                  <?php $mail = get_option('myhome_theme_options'); ?>
                  <a href="mailto:<?php echo $mail['text_mail'];?>" class="contact-adress_mail"><?php echo $mail['text_mail'];?></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.5853323277383!2d17.115730815614505!3d48.15679907922497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c894db77c45b9%3A0x183f162a427330ca!2sMy%20Home%20Apartments!5e0!3m2!1sru!2sua!4v1579171448006!5m2!1sru!2sua" 
            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="contact-box">
              <h2>
                
                <p class="heading"><?php the_field('title_below')?></p>
                <p class="heading-after"><?php the_field('text_below')?></p>
              </h2>
              <a href="#" class="special-btn">Book now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
           
            <?php dynamic_sidebar( 'sidebar-footer') ?>
          </div>
          <div class="col-md-8">
            <div class="menu-footer">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu',
				'menu_id'        => 'menu-footer',
				get_search_form()
			) );
			?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>© Copyright My Home s.r.o. <?php echo date('Y') ?>. All Rights Reserved. <a href="#" class="footer-bottom_link">Terms & Conditions</a> apply </p>
          </div>
        </div>
      </div>
    </section>
   
                <div id="popup-form" class="popup-form">
                <button type="button" class="close footer-close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                  </button>
                <h4>Reservation Form</h4> 
                 <?php echo do_shortcode('[contact-form-7 id="524" title="Form"]') ?>
                </div>
                <div class="overlay"></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
