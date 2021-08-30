<?php get_header(); ?>

  <section class="page-section news-section">
    <div class="news-section-container">
      <h2 class="gold-txt">from our</h2>
      <h3>Journal</h3>
    </div>
  </section>

  <?php if(have_posts()): ?>
  <section class="page-section news-article-section">
    <div class="article-categories">
      <?php if(is_active_sidebar('news-sidebar')): dynamic_sidebar('news-sidebar'); endif; ?>
    </div>

    <?php if(is_category()): ?>
    <div class="article-back_btn">
      <p><a href="/news" title="<?php bloginfo('name') ?> - Back to News" class="">/ back to news</a></p>
    </div>
    <?php endif; ?>

    <div class="article-container">
    <?php while(have_posts()): the_post(); ?>
      <article class="news-article" id="<?php echo 'news-article-' . $post->ID ?>">
        <?php if(have_rows('featured_image')): while(have_rows('featured_image')): the_row(); $_thumb = get_sub_field('thumbnail_image'); ?>
        <figure class="article-thumb">
          <img src="<?php echo $_thumb['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
        </figure>
        <?php endwhile; endif; ?>
        <h2 class="article-title"><?php the_title(); ?></h2>
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="article-link gold-txt">Read More</a>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

<?php get_footer(); ?>
