<?php /* Template Name: Page - About */ ?>

<?php get_header(); ?>

  <?php while(have_posts()): the_post();
    if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
      $_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image');
    endwhile; endif; ?>
    <section class="page-section page-heroimage about-heroimage">
      <picture class="homepage-heroimage">
        <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
        <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
      </picture>
    </section>
  <?php endwhile; ?>

  <section class="page-section community-jumplinks">
    <div class="jumplink-container">
      <ul class="jumplinks">
        <li><a href="#about">about us</a></li>
        <li><a href="#style">true style</a></li>
        <li><a href="#design">sustainable design</a></li>
        <li><a href="#confidence">true confidence</a></li>
        <li><a href="#giving">giving</a></li>
      </ul>
    </div>
  </section>

  <section class="page-section page-content-section house-bg" id="about">
    <div class="content-container">
      <?php the_content() ?>
    </div>
  </section>

  <?php if(have_rows('true_callouts')): ?>
  <section class="page-section true-callouts-section">
    <div class="callouts-container">
    <?php while(have_rows('true_callouts')): the_row(); $_calloutImage = get_sub_field('callout_photo') ?>
      <article class="callout <?php if(get_sub_field('callout_title') != 'design'): ?>blue-bg<?php endif; ?>" id="<?php echo get_sub_field('callout_title') ?>" >
        <div class="callout-left">
          <?php if(get_sub_field('callout_title') == 'style'): ?>
          <figure class="tile-logo">
            <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-style.svg" alt="<?php echo get_sub_field('callout_title') . '- logo' ?>" class="img-fluid aligncenter"/>
          </figure>
          <?php elseif(get_sub_field('callout_title') == 'confidence'): ?>
            <figure class="tile-logo">
              <img src="<?php bloginfo('template_directory') ?>/assets/images/brand-logos/true-confidence.svg" alt="<?php echo get_sub_field('callout_title') . '- logo' ?>" class="img-fluid aligncenter"/>
            </figure>
          <?php endif; ?>
          <?php echo get_sub_field('callout_content') ?>
        </div>
        <div class="callout-right">
          <figure>
            <img src="<?php echo $_calloutImage['url'] ?>" alt="<?php echo $_calloutImage['alt'] ?>" class="img-fluid" />
          </figure>
        </div>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

<?php get_footer(); ?>
