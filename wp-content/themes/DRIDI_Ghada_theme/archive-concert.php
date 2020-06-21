<?php/* 
Template Name: Archive Concert
*/ ?>

<?php get_header(); ?>
<div class="center mb-5">
  <h1>List of concerts</h1>
  <div class="mt-3">

    <?php
    $args_concert = array(
     'post_type' => 'concerts',
     'orderby' => 'date',
     'order' => 'DESC'
     );
   $query_concert = new WP_Query($args_concert);
    foreach($query_concert -> posts as $post): ?>
      <div>
            <h3>
              <a href="<?php echo get_the_permalink($post); ?>">
                <?php  echo get_the_title($post); ?>
              </a>
            </h3>
            <p class="text-justify"><?php  echo get_the_content($more_link_text = null, $strip_teaser = false, $post  ); ?></p>
            <p>Date : <?php the_field('date'); ?></p>
            <p>Time : <?php the_field('heure_de_debut'); ?></p>
            <p>Duration : <?php the_field('duree'); ?></p>
            <p>Place : <?php the_field('lieu'); ?></p>
         
      </div>
    <?php endforeach;	?>

  </div>
</div>
<?php get_footer(); ?>
