<?php
/*
- list out communities
-- pull homes for that community
--- if 'homeplan_availability' == 'available' show
*/
$_terms = get_terms('community',
	array(
		'orderby'	=> 'slug',
		'hide_empty' => 1,
		'exclude' => array(18)
	));
?>

<section class="page-section qmi-homes-section">
	<div class="homes-container">
		<?php foreach($_terms as $_term): $_community = $_term->name; ?>
		<div class="community-container" id="<?php echo $_term->slug ?>">
			<h2>Available Homes at <?php echo $_community ?></h2>
			<?php
			$_qmiHomes = new WP_Query();
			$_args = array(
			  'post_type' 			=> 'models',
			  'post_status' 		=> 'publish',
			  'posts_per_page' 	=> -1,
			  'order' 					=> 'desc',
			  'orderby' 				=> 'date',
				'tax_query'				=> array(
					array(
						'taxonomy'	=> 'community',
						'field'			=> 'slug',
						'terms'			=> $_term->slug
					)
				)
			);
			$_qmiHomes->query($_args);
			?>
			<?php if($_qmiHomes->have_posts()): ?>
			<div class="community-homes-container">
				<?php while($_qmiHomes->have_posts()): $_qmiHomes->the_post() ?>
					<?php if(get_field('homeplan_availability') == 'available'): ?>
						<article class="qmi-home design" id="<?php echo $post->post_title ?>">
							<figure class="design-image">
							<?php while(have_rows('homeplan_heroimage')): the_row();
								$_lgImage  = get_sub_field('large_image');
								$_mobImage = get_sub_field('mobile_image');
							?>
								<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
								<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="design-img img-fluid" />
							<?php endwhile; ?>
								<?php if(get_field('homeplan_availability')):
									$_field = get_field_object('homeplan_availability');
									$_value = $_field['value'];
									$_label = $_field['choices'][$_value];
								endif; ?>
								<div class="homeplan-ribbon <?php echo $_value . '-ribbon' ?>"><?php echo $_label ?></div>
							</figure>
							<div class="design-info">
								<span class="red-txt"><?php echo get_field('homeplan_price') ?></span>
								<h3 class="design-title"><?php the_title() ?></h3>
								<?php echo get_field('homeplan_details') ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn outline-btn gold-txt">View Floorplan</a>
							</div>
						</article>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
			<?php endif; wp_reset_query(); ?>
		</div>
		<?php endforeach; ?>
	</div>
</section>
