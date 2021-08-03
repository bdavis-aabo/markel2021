<?php
  global $_page;
  $_page = get_post($_page)->ID;
  $_currentPage = get_page($_page);

  $_designs = new WP_Query();
  $_args = array(
    'post_type'       => 'models',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'community'        => $post->post_name,
    'order'           => 'ASC',
    'orderby'         => 'menu_order'
  );
  $_designs->query($_args);
?>

  <?php if($_designs->have_posts()): ?>
  <section class="page-section community-design" id="designs">
    <div class="design-header">
      <span class="gold-text section-title">overview</span>
      <h2>Available at <?php echo $_currentPage->post_title; ?></h2>
    </div>

    <div class="design-container">
      <?php while($_designs->have_posts()): $_designs->the_post(); ?>
      <article class="design" id="<?php $post->post_name ?>">
        <figure class="design-image">
        <?php while(have_rows('homeplan_heroimage')): the_row();
          $_lgImage  = get_sub_field('large_image');
          $_mobImage = get_sub_field('mobile_image');
        ?>
          <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
          <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="design-img img-fluid" />
        <?php endwhile; ?>
        </figure>
        <div class="design-info">
          <span class="red-txt">Price from $<?php echo get_field('homeplan_price') ?>
          <h3 class="design-title"><?php the_title() ?></h3>
          <p class="gray-txt"><?php echo get_field('homeplan_details') ?></p>

          <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn outline-btn gold-txt">View Floorplan</a>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
  </section>
  <?php endif; wp_reset_query(); ?>
