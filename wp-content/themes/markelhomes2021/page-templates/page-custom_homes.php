<?php /* Template Name: Page - Custom Homes */ ?>

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
      <?php if(is_page('custom-homes')): ?>
      <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-custom.svg" alt="<?php bloginfo('name') ?> - True Custom" class="img-fluid" />
      <?php elseif(is_page('realtors')): ?>
      <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-respect.svg" alt="<?php bloginfo('name') ?> - True Respect" class="img-fluid" />
      <?php elseif(is_page('true-style-design-suites')): ?>
      <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-style.svg" alt="<?php bloginfo('name') ?> - True Style Design Suites" class="img-fluid" />
      <?php endif; ?>
    </div>
  </section>
  <?php endwhile; ?>

  <section class="page-section page-content-section house-bg">
    <div class="content-container">
      <?php the_content() ?>
      <?php if(is_page('realtors')): ?><button class="btn outline-btn gold-txt gray-outline realtor-btn" data-target="#realtor">Click here to register</button><?php endif; ?>
    </div>
  </section>

  <?php if(have_rows('custom_home_processes')): ?>
  <section class="page-section custom-home-process blue-bg">
    <div class="process-container">
    <?php while(have_rows('custom_home_processes')): the_row() ?>
      <article class="process">
        <?php echo get_sub_field('process') ?>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if(have_rows('custom_home_locations')): ?>
  <section class="page-section custom-home-locations">
    <div class="locations-container">
    <?php while(have_rows('custom_home_locations')): the_row(); $_homeImage = get_sub_field('custom_home_image'); ?>
      <article class="custom-location">
        <figure>
          <img src="<?php echo $_homeImage['url'] ?>" title="<?php echo $_homeImage['alt'] ?>" class="img-fluid" />
        </figure>

        <a href="<?php echo get_sub_field('custom_home_link') ?>" title="<?php echo get_sub_field('custom_homes_title') ?>" class="btn outline-btn white-btn">
          <?php echo get_sub_field('custom_homes_title') ?>
        </a>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

<?php get_footer(); ?>
