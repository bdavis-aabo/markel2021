
	<section class="page-section community-location" id="location">
		<div class="location-left location-map" id="<?php echo $post->post_name . '-map' ?>"></div>
		<div class="location-right location-contact gray-bg">
			<div class="location-right-contents">
				<span class="gold-txt section-title">location</span>
				<h3 class="location-title"><?php the_title() ?> sales office</h3>
				<p class="community-homeplan-details"><?php echo get_field('square_footage') ?></p>
				<p class="community-address"><?php echo get_field('community_address') ?></p>

				<?php if(get_field('community_phone') != ''): ?>
				<p class="community-phone">
					Please call for an appointment<br/>
					<span class="gold-txt"><?php echo get_field('community_phone') ?></span>
				</p>
				<?php endif; ?>

				<?php if(get_field('community_directions') != ''): ?>
				<p class="community-directions">
					<a href="<?php echo get_field('community_directions') ?>" title="<?php the_title() ?> - Directions" target="_blank" class="btn outline-btn white-btn">Get Directions</a>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</section>
