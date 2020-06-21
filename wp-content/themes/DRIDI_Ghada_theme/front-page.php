

<?php get_header(); ?>
  <h1 class=" pt-5 pb-5">Concerts & Artists</h1>
  <div class="d-flex ">
    <div class="mr-5">

      <h3>List of artists : </h3>
      <?php
       $args_artist = array(
    		'post_type' => 'artists',
    		'orderby' => 'date',
    		'order' => 'DESC'
    		);
    	$query_artist = new WP_Query($args_artist);

    	foreach($query_artist-> posts as $post): ?>
    		<div>
            <a href="<?php echo get_the_permalink($post); ?>">
              <?php  echo get_the_title($post); ?>
          
            </a>
    		</div>
    	<?php endforeach;	?>
    
    </div>

    <div class="ml-5">
      <h3>List of Concerts </h3>
      <?php
      $args_concert = array(
       'post_type' => 'concerts',
       'orderby' => 'date',
       'order' => 'DESC'
       );
     $query_concert = new WP_Query($args_concert);
      foreach($query_concert -> posts as $post): ?>
        <div>
            <a href="<?php echo get_the_permalink($post); ?>">
              <?php  echo get_the_title($post); ?>
            
            </a>
        </div>
      <?php endforeach;	?>
      
    </div>
 
  </div>
  <div class="d-flex ">
    <div class="mr-5">
  <?php
  echo do_shortcode ("[mostRecentConcerts]");
  ?>
   </div>
 
 </div>

<?php get_footer(); ?>
