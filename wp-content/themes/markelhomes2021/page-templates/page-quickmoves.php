<?php /* Template Name: Page - Quick Move-Ins */ ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post();
	if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
		$_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image');
	endwhile; endif;
?>
	<section class="page-section page-heroimage">
		<picture class="homepage-heroimage">
			<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
			<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="pagehero-img img-fluid" />
		</picture>
	</section>

	<section class="page-section page-content-section qmi-content-section">
		<div class="content-container">
			<?php the_content() ?>
		</div>
	</section>

	<?php get_template_part('homes/qmi-homes'); ?>
<?php endwhile;  ?>




<?php get_footer(); ?>
