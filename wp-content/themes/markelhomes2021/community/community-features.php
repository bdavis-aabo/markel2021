  <?php if(have_rows('community_slider_section')): ?>
  <section class="page-section community-features" id="community">
    <div class="community-features-container carousel slide" id="community-slide">
      <div class="carousel-inner">
      <?php $_s = 0; while(have_rows('community_slider_section')): the_row();
        $_lgImage = get_sub_field('tab_image');
        $_mobImage = get_sub_field('tab_mobile_image');
      ?>
        <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>" id="<?php echo $_s ?>">
          <picture>
            <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
            <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
          </picture>

          <div class="community-feature-content">
            <span class="gold-txt section-title">
              <?php if($_s == 0): ?>The Community<?php elseif($_s == 1): ?>Schools<?php else: ?>What's Nearby<?php endif; ?>
            </span>
            <h2><?php echo get_sub_field('tab_title') ?></h2>
            <?php echo get_sub_field('tab_content') ?>
          </div>
        </div>
      <?php $_s++; endwhile; ?>
      </div>

      <ol class="carousel-indicators">
        <?php $_i = 0; while(have_rows('community_slider_section')): the_row(); ?>
        <li data-target="#community-slide" data-slide-to="<?php echo $_i ?>" <?php if($_i == 0): ?>class="active"<?php endif; ?>>
          <?php if($_i == 0): ?>The Community<?php elseif($_i == 1): ?>Schools<?php else: ?>What's Nearby<?php endif; ?>
        </li>
        <?php $_i++; endwhile; ?>
      </ol>
    </div>

    <?php if(get_field('community_brochure') != ''): $_brochure = get_field('community_brochure'); ?>
    <div class="community-brochure-download">
      <a href="<?php echo $_brochure['url'] ?>" target="_blank" title="<?php the_title() ?> - Community Brochure" class="btn outline-btn gold-txt">Download Community Brochure</a>
    </div>
    <?php endif; ?>
  </section>
  <?php endif; ?>
