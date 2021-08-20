<?php /* Template Name: Page - Realtors */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post();
  if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
    $_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image');
  endwhile; endif; ?>
<section class="page-section page-heroimage">
  <picture class="homepage-heroimage">
    <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
    <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
  </picture>
  <div class="brand-logo blue-bg">
  <?php if(is_page('realtors')): ?>
    <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-respect.svg" alt="<?php bloginfo('name') ?> - True Respect" class="img-fluid" />
  <?php elseif(is_page('homeowners')): ?>
    <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-assurance.svg" alt="<?php bloginfo('name') ?> - True Assurance" class="img-fluid" />
  <?php endif; ?>
  </div>
</section>


<section class="page-section page-content-section house-bg">
  <div class="content-container">
    <?php the_content() ?>
    <?php if(is_page('realtors')): ?><button class="btn outline-btn gold-txt gray-outline realtor-btn" data-target="#realtor">Click here to register</button><?php endif; ?>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
