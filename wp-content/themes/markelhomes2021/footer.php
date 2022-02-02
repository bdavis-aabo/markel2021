  <footer class="footer red-bg">
    <section class="footer-content-container">
      <div class="logo-container">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/markel_white-house.svg" alt="<?php bloginfo('name') ?> - house logo" class="img-fluid house-logo" />
      </div>
      <div class="footer-left">
        <span class="footer-title">Contact Us</span>
        <?php if(is_active_sidebar('contact-address')): dynamic_sidebar('contact-address'); endif; ?>
      </div>
      <div class="footer-right">
        <span class="footer-title">FOLLOW US</span>
        <ul class="social-links">
          <li><a href="https://www.facebook.com/MarkelHomes/" target="_blank" title="<?php bloginfo('name') ?> on facebook"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="https://www.instagram.com/markelhomes/" target="_blank" title="<?php bloginfo('name') ?> on Instagram"><i class="fab fa-instagram"></i></a></li>
          <li><a href="https://www.linkedin.com/company/markel-homes/" target="_blank" title="<?php bloginfo('name') ?> on Vimeo"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="http://houzz.com/pro/markelhomes/markel-homes" target="_blank" title="<?php bloginfo('name') ?> on Houzz"><i class="fab fa-houzz"></i></a></li>
        </ul>
      </div>
      <div class="footer-copyright">
        <p class="small">&copy; <?php echo date('Y') . ' '; bloginfo('name') ?></p>
        <p><img src="<?php bloginfo('template_directory') ?>/assets/images/eho-icon.png" class="img-fluid aligncenter" /></p>
      </div>
    </section>
  </footer>


  <section class="contact-form-section blue-bg" id="contact-form">
    <button class="close-contact-btn" data-target="#contact-form"><i class="fal fa-times"></i></button>
    <div class="contact-form-container">
      <div class="contact-form-content">
        <h1 class="white-txt">Get In Touch</h1>
        <p>Let us know which communities you are interested in and we'll keep you updated on information and events.</p>
      </div>
      <div class="contact-form">
        <?php echo do_shortcode('[contact-form-7 id="5" title="Contact Form"]') ?>

        <?php if(is_active_sidebar('contact-disclaimer')): ?>
        <div class="disclaimer"><?php dynamic_sidebar('contact-disclaimer'); ?></div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php if(is_page('realtors')): ?>
  <section class="contact-form-section blue-bg" id="realtor-form">
    <button class="close-contact-btn" data-target="#realtor-form"><i class="fal fa-times"></i></button>
    <div class="contact-form-container">
      <div class="contact-form-content">
        <h1 class="white-txt">Broker Registration</h1>
        <p>Let us know which communities you are interested in and we'll keep you updated on information and events.</p>
      </div>
      <div class="contact-form">
        <?php echo do_shortcode('[contact-form-7 id="517" title="Broker Registration"]') ?>

        <?php if(is_active_sidebar('contact-disclaimer')): ?>
        <div class="disclaimer"><?php dynamic_sidebar('contact-disclaimer'); ?></div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php /* if(is_page('markel-homes-and-communities')): ?>
  <section class="homepage-lightbox dark-bg" id="homepageLightbox">
    <div class="lightbox-contents">
      <button class="closeLightbox"><i class="fal fa-times"></i></button>
      <?php if(is_active_sidebar('homepage-popup')): dynamic_sidebar('homepage-popup'); endif; ?>
    </div>
  </section>
  <?php endif; */ ?>

  <button class="up-btn" id="scrollTopButton"><i class="fal fa-arrow-up"></i></button>

  <?php wp_footer(); ?>
  </body>
</html>
