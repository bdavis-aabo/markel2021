<?php

$_about = new WP_Query();
$_args = array(
  'post_type' 			=> 'page',
  'post_status' 		=> 'publish',
  'posts_per_page' 	=> 1,
	'pagename'				=> 'markel-difference'
);
$_about->query($_args);
?>

<?php if($_about->have_posts()): while($_about->have_posts()): $_about->the_post() ?>

<?php if(have_rows('true_callouts')): $_rows = get_field('true_callouts'); $_r == 0; ?>
<section class="page-section true-callouts-section">
	<div class="callouts-container">
	<?php while(have_rows('true_callouts')): the_row(); $_calloutImage = get_sub_field('callout_photo') ?>
		<?php if($_r <= 1): ?>
		<article class="callout" id="<?php echo get_sub_field('callout_title') ?>" >
			<div class="callout-left <?php if(get_sub_field('callout_title') != 'design'): ?>blue-bg<?php endif; ?>">
				<div class="callout-left-contents">
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
			</div>
			<div class="callout-right">
				<figure>
					<img src="<?php echo $_calloutImage['url'] ?>" alt="<?php echo $_calloutImage['alt'] ?>" class="img-fluid" />
				</figure>
			</div>
		</article>
		<?php endif; ?>
	<?php $_r++; endwhile; ?>
	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; wp_reset_query(); ?>
