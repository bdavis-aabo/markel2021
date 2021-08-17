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
          <li><a href="" target="_blank" title="<?php bloginfo('name') ?> on Vimeo"><i class="fab fa-vimeo"></i></a></li>
        </ul>
      </div>
      <div class="footer-copyright">
        <p class="small">&copy; <?php echo date('Y') . ' '; bloginfo('name') ?></p>
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

        <p class="disclaimer">Markel Homes will use the information you provide on this form to be in touch with you via email and to provide updates and marketing. You can change your mind at any time by clicking the unsubscribe link in the footer of any email you receive from us, or by contacting us at denise@markelhomes.com. We will treat your information with respect. For more information about our privacy practices please visit our website. By clicking below, you agree that we may process your information in accordance with these terms. We use MailChimp as our marketing automation platform. By clicking below to submit this form, you acknowledge that the information you provide will be transferred to MailChimp for processing in accordance with their Privacy Policy and Terms.</p>
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
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php wp_footer(); ?>
  </body>
</html>
