  <section class="home-section home-tiles">
    <div class="tile-container">
      <?php while(have_rows('homepage_tiles')): the_row();
      if(get_sub_field('tile_image') != ''): $_tileImage = get_sub_field('tile_image'); endif;
      ?>
      <?php if(get_sub_field('community') == true): ?>
      <article class="tile community-tile">
        <img src="<?php echo $_tileImage['url'] ?>" alt="<?php echo $_tileImage['alt'] ?>" class="img-fluid tile-image" />
        <div class="tile-overlay">
          <div class="tile-overlay-contents">
            <?php echo get_sub_field('tile_contents') ?>
            <a href="<?php echo get_sub_field('tile_link') ?>" class="btn outline-btn white-btn">explore</a>
          </div>
        </div>
      </article>
      <?php else: ?>
      <article class="tile difference-tile blue-bg">
        <div class="tile-contents">
            <?php if(get_sub_field('tile_logo') != ''): $_tileLogo = get_sub_field('tile_logo'); ?>
            <figure class="tile-logo">
              <img src="<?php echo $_tileLogo['url'] ?>" alt="<?php echo $_tileLogo['alt'] ?>" class="img-fluid aligncenter"/>
            </figure>
            <?php endif; ?>
            <?php echo get_sub_field('tile_contents') ?>
            <a href="<?php echo get_sub_field('tile_link') ?>" class="btn outline-btn white-btn">learn more</a>

        </div>
      </article>
      <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </section>
