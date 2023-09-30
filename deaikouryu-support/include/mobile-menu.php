<nav class="mobile-menu">
<div class="logo item">
              <a href="<?= esc_url(home_url('/')); ?>">
             <img src="<?= get_template_directory_uri(); ?>/images/logo.png" alt="logo画像" srcset="">
             </a>
</div>
        <?php
                $args=[
                  'menu'=>'mobile-nav',
                  'menu_class'=>'mobile-menu__main',
                  'container'=>false,
                
                ];
                wp_nav_menu($args);
                
                ?>
           
      </nav>


