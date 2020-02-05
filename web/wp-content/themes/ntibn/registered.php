<?php get_header(); ?>
<?php if (have_posts()):while (have_posts()):the_post(); ?>
<section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container">
<?php the_content(); ?>
<?php edit_post_link('edit', '<p>', '</p><br/>'); ?>
</div>   
</section>    
<?php endwhile; endif;?>

<?php get_footer(); ?>