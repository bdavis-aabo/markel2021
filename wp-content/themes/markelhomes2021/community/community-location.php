
	<section class="page-section community-location" id="location">
		<div class="location-left location-map" id="<?php echo $post->post_name . '-map' ?>"></div>
		<div class="location-right location-contact gray-bg">
			<div class="location-right-contents">
				<span class="gold-txt section-title">location</span>
				<h3 class="location-title"><?php the_title() ?> sales office</h3>
				<p class="community-homeplan-details"><?php echo get_field('square_footage') ?></p>
				<p class="community-address"><?php echo get_field('community_address') ?></p>

				<?php if(have_rows('community_contact')): ?>
				<div class="community-contact-container">
					<?php while(have_rows('community_contact')): the_row(); ?>
						Please call or email <?php echo get_sub_field('name') ?> for an appointment: <br/>
							<a href="tel:<?php echo str_replace('-','',get_sub_field('phone')) ?>" class="btn outline-btn gold-btn"><i class="fas fa-phone"></i> <?php echo get_sub_field('phone') ?></a>
							<a href="mailto:<?php echo get_sub_field('email') ?>" title="email sales at <?php the_title() ?>" class="btn outline-btn gold-btn">
								<i class="fas fa-envelope"></i> <?php echo 'Email'; ?></a>

					<?php endwhile; ?>
				</div>
				<?php endif; ?>

				<?php if(get_field('community_directions') != ''): ?>
				<p class="community-directions" style="margin: 12px 0;">
					<a href="<?php echo get_field('community_directions') ?>" title="<?php the_title() ?> - Directions" target="_blank" class="btn outline-btn white-btn">Get Directions</a>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</section>
