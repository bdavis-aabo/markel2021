<?php /* Template Name: Page - Gallery */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
  <?php if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
    $_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image'); ?>
  <section class="page-section page-heroimage-section">
    <picture class="page-heroimage">
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
      <h1 class="heroimage-caption">PHOTO GALLERY</h1>
    </picture>
  </section>
  <?php endwhile; endif; ?>

  <?php if(get_field('page_gallery') && is_page('gallery')): ?>
  <section class="page-section gallery-section">
    <div class="gallery-container">
      <?php echo do_shortcode(get_field('page_gallery')) ?>
    </div>
  </section>
  <?php endif; ?>
<?php endwhile; ?>



<?php get_footer(); ?>
