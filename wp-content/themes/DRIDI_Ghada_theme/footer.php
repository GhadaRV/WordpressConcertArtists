<footer class="fixed-bottom">
<div class="container">
        <?php
        $footer = array(
            'theme_location'=>'footer_menu',
            'container' => 'nav',
            'menu_class' => 'navigation'
        );
        wp_nav_menu($footer);
        
        wp_footer();
        ?>
  </div>
  </div>
</footer>