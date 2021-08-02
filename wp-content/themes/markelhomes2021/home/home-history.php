  <section class="home-section home-content-section">
    <?php while(have_rows('homepage_history')): the_row(); $_historyImage = get_sub_field('history_image'); ?>
      <div class="home-content-container">
        <div class="history-left"><?php echo get_sub_field('history_content') ?></div>
        <div class="history-right">
          <figure class="history-image">
            <img src="<?php echo $_historyImage['url'] ?>" alt="<?php $_historyImage['alt'] ?>" class="img-fluid" />
          </figure>
        </div>
      </div>
    <?php endwhile; ?>
  </section>
