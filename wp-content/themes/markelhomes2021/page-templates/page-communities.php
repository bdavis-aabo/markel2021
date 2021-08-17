<?php /* Template Name: Page - Communities */ ?>

<?php
  $_comms = new WP_Query();
  $_args = array(
    'post_type'       => 'page',
    'posts_per_page'  =>  -1,
    'post_parent'     =>  $post->ID,
    'post_status'     => 'publish',
    'order'           => 'ASC',
    'orderby'         => 'title'
  );
  $_comms->query($_args);
?>


<?php get_header(); ?>

  <section class="page-section community-section">
    <div class="map-container" id="communityMap"></div>
    <div class="community-container">
      <?php if($_comms->have_posts()): while($_comms->have_posts()): $_comms->the_post(); ?>
      <article class="community-box" id="<?php echo $post->post_name ?>">
        <div class="community-image">
          <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
        </div>
        <div class="community-details">
          <h3 class="community-name"><?php the_title() ?></h3>
          <p class="community-location"><?php echo get_field('location') ?></p>
          <p class="community-info">
            <?php echo get_field('square_footage') . '  |  ' . get_field('beds') . ' beds  |  ' . get_field('baths') . ' baths' ?><br />
            Priced from $<?php echo get_field('pricing'); ?>
          </p>
          <p><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="btn outline-btn gold-txt">visit community</a></p>
        </div>
      </article>
      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </section>

  <section class="page-section community-link-section">
    <div class="link-container">
      <ul class="community-links">
      <?php while($_comms->have_posts()): $_comms->the_post(); ?>
        <li class="community-link">
          <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </li>
      <?php endwhile; ?>
      </ul>
    </div>
  </section>

<?php get_footer(); ?>
