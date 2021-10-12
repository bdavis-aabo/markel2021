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

    <?php if(is_page('realtors')): ?>
    <div class="brand-logo blue-bg">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-respect.svg" alt="<?php bloginfo('name') ?> - True Respect" class="img-fluid" />
    </div>
    <?php elseif(is_page('true-style-design-suites')): ?>
    <div class="brand-logo blue-bg">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-style.svg" alt="<?php bloginfo('name') ?> - True Style Design Suites" class="img-fluid" />
    </div>
    <?php endif; ?>

  </section>
  <?php endwhile; ?>

  <section class="page-section page-content-section house-bg">
    <div class="content-container">
      <?php the_content() ?>
      <?php if(is_page('realtors')): ?><button class="btn outline-btn gold-txt gray-outline realtor-btn" data-target="#realtor">Click here to register</button><?php endif; ?>
    </div>
  </section>

  <?php if(have_rows('home_collections')): ?>
  <section class="page-section home-collection-section">
    <div class="collection-container">
    <?php while(have_rows('home_collections')): the_row(); $_homeImage = get_sub_field('collection_image'); ?>
      <article class="home-collection">
        <div class="collection-image">
          <figure><img src="<?php echo $_homeImage['url'] ?>" alt="<?php echo $_homeImage['alt'] ?>" class="img-fluid"></figure>
        </div>
        <div class="collection-information <?php echo get_sub_field('collection_color') . '-bg' ?>">
          <div class="collection-content">
            <?php echo get_sub_field('collection_content') ?>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

<?php get_footer(); ?>
