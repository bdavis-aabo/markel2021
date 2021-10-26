<?php /* Template Name: Page - Community Details */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); $_lgImage = get_field('community_heroimage'); $_mobImage = get_field('community_heroimage_mobile'); ?>
  <section class="page-section page-heroimage-section">
    <picture class="page-heroimage">
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
      <h1 class="heroimage-caption"><?php the_title() ?> <span class="divider"> | </span> <?php echo get_field('location') ?></h1>
    </picture>

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
      <?php if(get_field('community_logo') != ''): $_logo = get_field('community_logo') ?>
      <figure class="community-logo">
        <img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
      </figure>
      <?php endif; ?>
      <span class="gold-txt section-title">overview</span>
      <?php the_content(); ?>
    </div>
  </section>

  <?php get_template_part('community/community-designs') ?>

  <?php if(get_field('community_map') != ''): $_mapImage = get_field('community_map_image'); ?>
  <section class="page-section community-interactive ltgreen-bg" id="map">
    <div class="map-title">
      <span class="white-txt section-title">community map</span>
      <h2 class="white-txt"><?php echo 'at '; the_title(); ?></h2>
    </div>
    <div class="map-container embed-responsive embed-responsive-1by1 nomobile">
      <iframe src="<?php echo get_field('community_map') ?>" class="interactive-map embed-responsive-item"></iframe>
    </div>
    <div class="map-container mobileonly">
      <figure>
        <img src="<?php echo $_mapImage['url'] ?>" class="img-fluid" alt="<?php the_title(); ?> - Community Map" />
      </figure>
    </div>
  </section>
  <?php elseif(get_field('community_map') == '' && get_field('community_map_image') != ''): $_mapImage = get_field('community_map_image'); ?>
  <section class="page-section community-interactive ltgreen-bg" id="map">
    <div class="map-title">
      <span class="white-txt section-title">community map</span>
      <h2 class="white-txt"><?php echo 'at '; the_title(); ?></h2>
    </div>
    <div class="map-container">
      <figure>
        <img src="<?php echo $_mapImage['url'] ?>" class="img-fluid aligncenter" alt="<?php the_title(); ?> - Community Map" />
      </figure>
    </div>
  </section>
  <?php endif; ?>

  <?php if(get_field('community_map_file') != ''): $_mapFile = get_field('community_map_file');?>
  <section class="page-section community-download blue-bg">
    <div class="download-container">
      <a href="<?php echo $_mapFile['url'] ?>" title="<?php the_title() ?> - Map Download" target="_blank" class="btn outline-btn gold-txt">
        Download Community Map
      </a>
    </div>
  </section>
  <?php endif; ?>

  <?php // QMI HOMES??? ?>

  <?php get_template_part('community/community-features') ?>

<?php get_footer(); ?>
