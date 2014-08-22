<?php 
/**
 * Template Name: Single Image Home Template
 */
?>
<?php 
global $post; 
get_header();
?>
<?php if (have_posts()) : ?>                
    <?php
        while(have_posts()) : the_post();
    ?>
<!-- Container
======================================================================== -->
<div class="site-inner">
    <div class="wrap">
        <?php the_content(); ?>
    </div>
</div>
<!-- Container / End -->
    <?php endwhile; ?>
<?php endif; ?>  
<?php //get_footer(); ?>

    </div><!-- #content -->
    <div class="clearfix"></div>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>