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
        <span class="footer-title">Contact Us</span>
        <ul class="social-links">
          <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
          <li><a href=""><i class="fab fa-instagram"></i></a></li>
          <li><a href=""><i class="fab fa-vimeo"></i></a></li>
        </ul>
      </div>
      <div class="footer-copyright">
        <p class="small">&copy; <?php echo date('Y') . ' '; bloginfo('name') ?></p>
      </div>
    </section>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>
