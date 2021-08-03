<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
  <section class="page-section floorplan-heroimage">
    <figure>
      <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
    </figure>
  </section>

  <section class="page-section floorplan-description">
    <div class="back-btn-container">
      back button to community
    </div>
    <div class="floorplan-contents">
      <h1 class="floorplan-title"><?php the_title(); ?></h2>
      <?php echo get_field('homeplan_description'); ?>
    </div>
  </section>

  <?php if(get_field('homeplan_gallery') != ''): ?>
  <section class="page-section floorplan-gallery">
    <div class="gallery-container">
      insert gallery code
    </div>
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

  <?php if(get_field('homeplan_images') != ''):
    $_floorplanImages = get_field('homeplan_images'); $_t = 0; $_c = 0;
  ?>
  <section class="page-section floorplan-images">
    <div class="floorplan-image-container">
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

      <?php if(get_field('homeplan_brochure') != ''): ?>
      <div class="brochure container blue-bg">
        <a href="<?php echo get_field('homeplan_brochure') ?>" title="<?php the_title(); echo ' - Homeplan Brochure'; ?>" target="_blank" class="btn outline-btn gold-txt">
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
