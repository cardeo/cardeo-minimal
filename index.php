<?php get_header(); ?>



 <div id="main">
<!-- LEFT COLUMN //-->
  <div id="left">
  <img src="wp-content/themes/cardeo-minimal/images/image.jpg" width="560" height="407" alt="image" />
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
   <h4 style="margin-top:30px;"><?php the_time('m-d-y'); ?></h4>
   <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
   <?php the_content(__('Read more...')); ?>
   <div class="post-footer">
    <div class="post-footer-left">Posted by <?php the_author(); ?> &#187; <?php the_category(', ') ?></div>
    <div class="post-footer-right"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
   </div>
<?php endwhile; else : ?>

<?php endif; ?>
<div id="next"><?php posts_nav_link(); ?></div>
  </div>



	
<?php get_sidebar(); ?>	



<?php get_footer(); ?>