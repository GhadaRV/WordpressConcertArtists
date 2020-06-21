<?php/* 
Template Name: Archive Artist
*/?>
<?php get_header(); ?>
<div >
  <h1>List of artists</h1>
  <div class="mt-3">

    <?php
    $args_concert = array(
     'post_type' => 'artists',
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
      
       
      
      </div>
    <?php endforeach;	?>

  </div>
</div>
<?php get_footer(); ?>