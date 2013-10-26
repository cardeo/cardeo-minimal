<?php get_header(); ?>



 <div id="main">
  <div id="left">
  <img src="wp-content/themes/cardeo-minimal/images/image.jpg" width="560" height="407" alt="image" />
  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <h2 class="page-header-bg"><?php the_title(); ?></h2>
  <?php the_content(); ?>
  </div>

<?php endwhile; else : ?>

<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>




	


