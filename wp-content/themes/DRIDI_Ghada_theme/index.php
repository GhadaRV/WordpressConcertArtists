
<?php
get_header();
if( have_posts() ) :
    while( have_posts() ) : the_post();
     ?>
     <h2>
       <a href=”<?php the_permalink(); ?>”>
         <?php the_title(); ?>
       </a>
     </h2>
     <small>
       Published on <?php the_time(); ?> By <?php the_author(); ?>
    </small>
     <?php the_content(); ?>
     <?php comments_template(); ?>
     <?php
    endwhile;
  else :
 ?>
 <h2>Post not found</h2>

 <?php
endif;
get_footer();
?>
