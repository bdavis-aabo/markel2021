<?php get_header(); ?>

  <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

    <?php if(have_rows('featured_image')): ?>
    <section class="page-section article-heroimage-section">
      <?php while(have_rows('featured_image')): the_row();
        $_mobImage = get_sub_field('thumbnail_image');
        $_lgImage  = get_sub_field('large_image');
      ?>
      <picture class="page-heroimage">
        <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
        <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
      </picture>
      <?php endwhile; ?>
    </section>
    <?php endif; ?>

    <section class="page-section news-article-section">
      <div class="article-back_btn">
        <p><a href="/news" title="<?php bloginfo('name') ?> - Back to News" class="">/ back</a></p>
      </div>

      <div class="article-container">
        <article class="news-article" id="<?php echo 'news-article-' . $post->ID ?>">
          <p class="post-meta gold-txt"><?php echo get_the_date('F j, Y') ?></p>
          <h2 class="article-title"><?php the_title(); ?></h2>
          <?php the_content() ?>
        </article>
      </div>
    </section>

    <?php endwhile; ?>
  <?php else: ?>
    not found error
  <?php endif; ?>

<?php get_footer(); ?>
