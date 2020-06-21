
<!DOCTYPE html>
<html lang="fr">
<head>
<header class="sticky-top">

        <div class="container">
     
      
<?php
  $header = [
        'theme_location'=>'top_menu',
        'container' => 'nav',
        'menu_class' => 'navigation'
    ];
    wp_nav_menu($header);

  wp_head();
   ?>

</div>
</header>
</html>

