<?php /* Template Name: Page - Marshall */ ?>

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
        <li><a href="#designs">home designs</a></li>
        <li><a href="#program">rebuilding timeline</a></li>
				<li><a href="#difference">markel difference</a></li>
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

			<p>
				<a href="#contact" class="contact-btn"><strong>Sign up for our interest list</strong></a> &amp; be notified when new updates and pricing become available.
				</p>

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

	<section class="page-section timeline-section blue-bg" id="program">
		<div class="timeline-container">
			<?php echo get_field('rebuilding_timeline_intro') ?>
			<img src="<?php bloginfo('template_directory') ?>/assets/images/rebuild-timeline.png" class="img-fluid" alt="rebuild timeline" />
			<?php echo get_field('rebuilding_financing') ?>
			<p><a href="https://markelhomes.com/2022/06/20/markel-homes-benefits-of-using-our-preferred-lender/" target="_blank" class="btn outline-btn white-btn">Learn More</a></p>
		</div>
	</section>

  <?php get_template_part('community/community-designs') ?>

	<?php get_template_part('community/community-difference') ?>

  <?php // QMI HOMES??? ?>

  <?php //get_template_part('community/community-features') ?>

	<?php get_template_part('community/community-marshall-location') ?>

<?php get_footer(); ?>
