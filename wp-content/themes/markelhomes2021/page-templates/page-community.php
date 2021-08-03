<?php /* Template Name: Page - Community Details */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); $_lgImage = get_field('community_heroimage'); $_mogImage = get_field('community_heroimage_mobile'); ?>
  <section class="page-section page-heroimage">
    <picture class="homepage-heroimage">
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
    </picture>
    <h1 class="heroimage-caption"><?php the_title() ?> | <?php echo get_field('location') ?></h1>
  </section>
  <?php endwhile; ?>

  <section class="page-section community-jumplinks">
    <div class="jumplink-container">
      <ul class="jumplinks">
        <li><a href="#overview">overview</a></li>
        <li><a href="#designs">home designs</a></li>
        <li><a href="#map">community map</a></li>
        <!-- <li><a href="#qmi">quick move-in homes</a></li> -->
        <li><a href="#community">the community</a></li>
      </ul>
    </div>
  </section>

  <section class="page-section community-overview" id="overview">
    <div class="comm-overview-container">
      <figure class="community-logo">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/community/<?php echo $post->post_name . '-logo.svg' ?>" alt="<?php the_title() ?>" class="img-fluid" />
      </figure>
      <span class="gold-text section-title">overview</span>
      <?php the_content(); ?>
    </div>
  </section>

  <?php get_template_part('community/community-designs') ?>

  <?php if(get_field('community_map') != ''): ?>
  <section class="page-section community-interactive ltgreen-bg" id="map">
    <div class="map-container">
      <iframe src="<?php echo get_field('community_map') ?>" class="interactive-map"></iframe>
    </div>
  </section>
  <?php endif; ?>

  <?php if(get_field('community_map_file') != ''): ?>
  <section class="page-section community-download blue-bg">
    <div class="download-container">
      <a href="<?php echo get_field('community_map_file') ?>" title="<?php the_title() ?> - Map Download" target="_blank" class="btn outline-btn gold-txt">
        Download Community Map
      </a>
    </div>
  </section>
  <?php endif; ?>

  <?php // QMI HOMES??? ?>

  <section class="page-section community-features" id="community">
    <?php if(get_field('community_bottom_image') != ''): $_communityImages = get_field('community_bottom_image'); ?>
    <div class="community-feature-images">
      <?php foreach($_communityImages as $_image): ?>
      <figure class="feature-image">
        <img src="<?php echo $_image['url'] ?>" class="img-fluid" alt="<?php $_image['alt'] ?>" />
      </figure>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="community-feature-content">
      <ul class="community-links">
        <li data-target="#community-slide" data-slide-to="0">The Community</li>
        <li data-target="#community-slide" data-slide-to="1">Schools</li>
        <li data-target="#community-slide" data-slide-to="2">What's Nearby</li>
      </ul>

      <div class="carousel slide" id="community-slide">
        <div class="carousel-inner">
          <?php $_s = 0; while(have_rows('community_slider_section')): the_row() ?>
          <div class="carousel-item <?php if($_s == 0): ?>active<?php endif; ?>">
            <span class="gold-txt slide-title">
              <?php if($_s == 0): ?>The Community<?php elseif($_s == 1): ?>Schools<?php else: ?>What's Nearby<?php endif; ?>
            </span>
            <h2><?php echo get_sub_field('tab_title') ?></h2>
            <p><?php echo get_sub_field('tab_content') ?></p>
          </div>
          <?php $_s++; endwhile; ?>
        </div>
      </div>

      <a href="#community_brochure" title="<?php the_title() ?> - Community Brochure" class="btn outline-btn gold-txt">Download Community Brochure</a>
    </div>
  </section>



<?php get_footer(); ?>
