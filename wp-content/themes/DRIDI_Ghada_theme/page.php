<?php get_header();?>
<div class="container pt-5 pb-5">

    <h1> <?php the_title();?> </h1>


<?php if(have_posts()):while(have_posts()): the_post();?>

<div class="text-center">
          <?php the_post_thumbnail();?>
        </div>
        
        <p class="text-justify"><?php the_content();?></p>

<?php endwhile; endif;?>




</div>
<?php get_footer();?>