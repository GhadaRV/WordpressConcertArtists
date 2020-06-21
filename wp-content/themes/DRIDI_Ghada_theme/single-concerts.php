<?php /* Template Name: Single Concert Page */ ?>

<?php get_header(); ?>
<h1>Single Concert</h1>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <p>Date : <?php the_field('date'); ?></p>
        <p>Time : <?php the_field('heure_de_debut'); ?></p>
        <p>Duration : <?php the_field('duree'); ?></p>
        <p>Place : <?php the_field('lieu'); ?></p>
        <p>Artists : <?php the_field('artists'); ?></p>

        <p><?php the_content()?></p>
        <!-- <i><?php the_date()?></i> -->


        <div>
        <h5> Concert Genre : </h5>
        <?php
          $terms = get_the_terms( $post->ID, 'genre' );
          $terms = ( $terms ) ? wp_list_pluck( $terms, 'name' ) : array();
          $genres = !empty( $terms ) ? '- ' . implode( '<br/>- ', $terms ) : '';
          echo $genres;
        ?>
      </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

    
