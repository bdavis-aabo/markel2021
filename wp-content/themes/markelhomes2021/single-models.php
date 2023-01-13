<?php get_header(); ?>

<?php while(have_posts()): the_post();
  $_postTerms = wp_get_post_terms($post->ID, 'community');
  $_location = $_postTerms[0];


?>
  <?php if(have_rows('homeplan_heroimage')): ?>
  <section class="page-section floorplan-heroimage">
    <figure>
    <?php while(have_rows('homeplan_heroimage')): the_row();
      $_lgImage  = get_sub_field('large_image');
      $_mobImage = get_sub_field('mobile_image');
    ?>
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
    <?php endwhile; ?>
    </figure>
  </section>
  <?php endif; ?>

  <section class="page-section floorplan-description">
    <div class="back-btn-container">
      <a href="/communities/<?php echo $_location->slug ?>" title="Back to <?php $_location->name; ?>">/ Back</a>
    </div>
    <div class="floorplan-contents">
      <h1 class="floorplan-title"><?php the_title(); ?> | <span class="price red-txt"><?php echo get_field('homeplan_price') ?></span></h2>
      <?php echo get_field('homeplan_description'); ?>
    </div>
  </section>

  <?php if(get_field('homeplan_gallery') != ''): $_gallery = get_field('homeplan_gallery'); ?>
  <section class="page-section floorplan-gallery">
    <div class="gallery-container" id="<?php echo $post->post_name . '-gallery'; ?>">
      <?php echo do_shortcode($_gallery) ?>
      <?php /*
      <span class="plus-icon fa-stack" style="vertical-align: top;">
        <i class="fal fa-circle fa-stack-2x"></i>
        <i class="fal fa-plus fa-stack-1x"></i>
      </span>
      */ ?>
    </div>
    <p class="small">Click the image above to see the full home plan gallery</p>
  </section>
  <?php endif; ?>

  <?php if(get_field('homeplan_features') != ''): ?>
  <section class="page-section floorplan-features">
    <div class="feature-container">
      <h2 class="gold-txt">Home Features</h2>
      <?php echo get_field('homeplan_features') ?>
    </div>
  </section>
  <?php endif; ?>

	<?php if(get_field('homeplan_tour') != ''): ?>
	<section class="page-section floorplan-tour">
		<div class="floorplan-tour-container feature-container">
			<h2 class="gold-txt">Virtual Tour</h2>
			<iframe src="<?php echo get_field('homeplan_tour') ?>" height="100%" width="100%" frameborder="0"></iframe>
		</div>
	</section>
	<?php endif; ?>

  <?php if(get_field('homeplan_images') != ''):
    $_floorplanImages = get_field('homeplan_images'); $_t = 0; $_c = 0;
  ?>
  <section class="page-section floorplan-images">
    <div class="floorplan-image-container">
      <h2 class="gold-txt">Floorplan Layout</h2>
      <ul class="nav nav-pills floorplan-tabs" role="tablist">
        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ', '-', $_image['title'])); ?>
        <li class="nav-item">
          <a href="#<?php echo $_tabLink ?>" class="nav-link <?php if($_t == 0): echo 'active'; endif; ?>" id="<?php echo $_tabLink . '-tab' ?>" role="tab" aria-controls="<?php echo $_tabLink . '-tab' ?>" data-toggle="tab">
            <?php echo $_image['title'] ?>
          </a>
        </li>
        <?php $_t++; endforeach; ?>
      </ul>
      <div class="tab-content" id="floorplan-tabcontent">
        <?php foreach($_floorplanImages as $_image): $_tabLink = strtolower(str_replace(' ','-',$_image['title'])); ?>
        <div class="tab-pane fade <?php if($_c == 0): echo 'show active'; endif; ?>" id="<?php echo $_tabLink ?>">
          <p class="floorplan-name"><?php the_title(); echo ' | ' . $_image['title'] ?><br/><?php echo $_image['caption'] ?></p>
          <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid aligncenter" />
        </div>
        <?php $_c++; endforeach; ?>
      </div>

      <?php if(get_field('homeplan_brochure') != ''): $_brochure = get_field('homeplan_brochure'); ?>
      <div class="brochure-container blue-bg">
        <a href="<?php echo $_brochure['url'] ?>" title="<?php the_title(); echo ' - Homeplan Brochure'; ?>" target="_blank" class="btn outline-btn gold-txt">
          Download Home Design Brochure
        </a>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>
<?php endwhile; // end page loop ?>

<?php //get_template_part('community/community-visit') ?>

<?php get_footer(); ?>
