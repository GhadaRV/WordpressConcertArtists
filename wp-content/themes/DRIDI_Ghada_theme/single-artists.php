<?php /* Template Name: Single Artist Page */ ?>
<?php get_header(); ?>

<?php
  if(have_posts()):
    while(have_posts()):
      the_post();

?>
      <h1 class="text-center"><?php the_title();?></h1>
      
      <p class="text-justify"><?php the_content();?></p>

      <div>
        <h5> Artist Genre : </h5>
        <?php
          $terms = get_the_terms( $post->ID, 'genre' );
          $terms = ( $terms ) ? wp_list_pluck( $terms, 'name' ) : array();
          $genres = !empty( $terms ) ? '- ' . implode( '<br/>- ', $terms ) : '';
          echo $genres;
        ?>
      </div>
<?php
    endwhile;
  endif;
?>

<?php get_footer(); ?>
