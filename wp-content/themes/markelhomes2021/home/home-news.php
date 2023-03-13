<?php
  // Latest Posts
  $_latestPosts = new WP_Query();
  $_args = array(
    'post_type'       => 'post',
    'post_status'     => 'publish',
    'posts_per_page'  => 3,
    'order'           => 'DESC',
    'orderby'         => 'date'
  );
  $_latestPosts->query($_args);
?>

  <section class="home-section news-section">
    <div class="news-container">
      <h2 class="news-title">What's Happening at Markel</h2>

      <?php while($_latestPosts->have_posts()): $_latestPosts->the_post(); ?>
      <article class="latest-post" id="<?php echo $post->post_name . '-post' ?>">
        <?php while(have_rows('featured_image')): the_row(); $_thumb = get_sub_field('thumbnail_image'); ?>
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
					<figure class="article-image">
          	<img src="<?php echo $_thumb['url'] ?>" alt="<?php the_title() ?>" class="img-fluid aligncenter" />
        	</figure>
				</a>
        <?php endwhile; ?>
        <div class="article-content">
          <span class="article-title"><?php the_title() ?></span>
          <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn outline-btn gold-txt">Read More&nbsp;&nbsp;<i class="fal fa-chevron-right"></i></a>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
  </section>
