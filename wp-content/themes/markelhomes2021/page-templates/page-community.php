<?php /* Template Name: Page - Community Details */ ?>
<?php
  global $_page;
  $_page = get_post($_page)->ID;
  $_currentPage = get_page($_page);

  $_designs = new WP_Query();
  $_args = array(
    'post_type'       => 'models',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'community'       => $post->post_name,
		'meta_key'				=> 'homeplan_availability',
    'order'           => 'ASC',
    'orderby'         => 'menu_order meta_value'
  );
  $_designs->query($_args);
?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); $_lgImage = get_field('community_heroimage'); $_mobImage = get_field('community_heroimage_mobile'); ?>
  <section class="page-section page-heroimage-section">
    <picture class="page-heroimage">
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
      <h1 class="heroimage-caption"><?php the_title() ?> <span class="divider"> | </span> <?php echo get_field('location') ?></h1>
    </picture>

  </section>
  <?php endwhile; ?>

  <section class="page-section community-jumplinks">
    <div class="jumplink-container">
      <ul class="jumplinks">
        <li><a href="#overview">overview</a></li>
        <?php if($_designs->have_posts()): ?><li><a href="#designs">home designs</a></li><?php endif; ?>
        <?php if(get_field('community_map') != ''): ?><li><a href="#map">community map</a></li><?php endif; ?>
				<?php if(have_rows('community_slider_section')): ?><li><a href="#community">the community</a></li><?php endif; ?>
				<li><a href="#location">location</a></li>
      </ul>
    </div>
  </section>

  <section class="page-section community-overview" id="overview">
    <div class="comm-overview-container">
      <?php if(get_field('community_logo') != ''): $_logo = get_field('community_logo') ?>
      <figure class="community-logo">
        <img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
      </figure>
      <?php endif; ?>
      <span class="gold-txt section-title">overview</span>
      <?php the_content(); ?>

			<?php if(have_rows('community_contact')): ?>
			<div class="community-contact-container">
				<?php while(have_rows('community_contact')): the_row(); ?>
					<?php if(get_sub_field('name') != ''): ?>
					Please call or email <?php echo get_sub_field('name') ?> for an appointment: <br/>
						<a href="tel:<?php echo str_replace('-','',get_sub_field('phone')) ?>" class="btn outline-btn gold-btn"><i class="fas fa-phone"></i> <?php echo get_sub_field('phone') ?></a>
						<a href="mailto:<?php echo get_sub_field('email') ?>" title="email sales at <?php the_title() ?>" class="btn outline-btn gold-btn">
							<i class="fas fa-envelope"></i> <?php echo 'Email'; ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
    </div>
  </section>

  <?php get_template_part('community/community-designs') ?>

  <?php if(get_field('community_map') != ''): $_mapImage = get_field('community_map_image'); ?>
  <section class="page-section community-interactive ltgreen-bg" id="map">
    <div class="map-title">
      <span class="white-txt section-title">community map</span>
      <h2 class="white-txt"><?php echo 'at '; the_title(); ?></h2>
    </div>
    <div class="map-container embed-responsive embed-responsive-1by1 nomobile">
      <iframe src="<?php echo get_field('community_map') ?>" class="interactive-map embed-responsive-item"></iframe>
    </div>
    <div class="map-container mobileonly">
      <figure>
        <img src="<?php echo $_mapImage['url'] ?>" class="img-fluid" alt="<?php the_title(); ?> - Community Map" />
      </figure>
    </div>
  </section>
  <?php elseif(get_field('community_map') == '' && get_field('community_map_image') != ''): $_mapImage = get_field('community_map_image'); ?>
  <section class="page-section community-interactive ltgreen-bg" id="map">
    <div class="map-title">
      <span class="white-txt section-title">community map</span>
      <h2 class="white-txt"><?php echo 'at '; the_title(); ?></h2>
    </div>
    <div class="map-container">
      <figure>
        <img src="<?php echo $_mapImage['url'] ?>" class="img-fluid aligncenter" alt="<?php the_title(); ?> - Community Map" />
      </figure>
    </div>
  </section>
  <?php endif; ?>

  <?php if(get_field('community_map_file') != ''): $_mapFile = get_field('community_map_file');?>
  <section class="page-section community-download blue-bg">
    <div class="download-container">
      <a href="<?php echo $_mapFile['url'] ?>" title="<?php the_title() ?> - Map Download" target="_blank" class="btn outline-btn gold-txt">
        Download Community Map
      </a>
    </div>
  </section>
  <?php endif; ?>

  <?php // QMI HOMES??? ?>

  <?php get_template_part('community/community-features') ?>

	<?php get_template_part('community/community-location') ?>

<?php get_footer(); ?>
