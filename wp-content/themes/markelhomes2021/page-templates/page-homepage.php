<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
  <?php if(have_rows('homepage_heroimage')): ?>
  <section class="home-section home-heroimage">
    <?php while(have_rows('homepage_heroimage')): the_row(); $_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image'); ?>
    <picture class="homepage-heroimage">
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
    </picture>
    <?php endwhile; ?>
    <h1 class="heroimage-caption">True Design</h1>
  </section>
  <?php endif; ?>

  <section class="home-section home-content-section">
    <div class="home-content-container">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <img src="<?php bloginfo('template_directory') ?>/assets/images/markel-line.jpg" alt="<?php bloginfo('name') ?> - logomark" class="img-fluid" />
      <?php the_content() ?>
    </div>
  </section>

  <?php if(have_rows('homepage_tiles')): get_template_part('home/home-tiles'); endif; // end tiles ?>

  <?php if(have_rows('homepage_history')): get_template_part('home/home-history'); endif; // end history ?>

  <?php if(get_field('homepage_quote') != ''): ?>
  <section class="home-section home-quote-section">
    <div class="quote-container"><?php echo get_field('homepage_quote') ?></div>
  </section>
  <?php endif; ?>
<?php endwhile; //end page loop ?>

  <?php get_template_part('home/home-news') ?>

<?php get_footer(); ?>
