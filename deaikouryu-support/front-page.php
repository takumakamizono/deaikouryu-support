<!DOCTYPE html>
<html lang="ja">
  <head>
  <?php get_header();?>
  </head>
  <body>
    <div id="global-container">
      <div id="container">
        <div class="mobile-menu__cover"></div>
        <div class="nav-trigger"></div>
        <header class="header">
        <?php get_template_part('include/header'); ?>
        </header>
        <div id="content">
        <?php get_template_part('include/hero'); ?>
          <div id="main-content">    
      
            <main>
            <?php get_template_part('include/outline'); ?>
            <?php get_template_part('include/worries'); ?>
            <?php get_template_part('include/recruitment'); ?>
            <?php get_template_part('include/benefits'); ?>
            <?php get_template_part('include/auxiliary'); ?>

              <?php get_template_part('include/news'); ?>
              
            </main>
          
          </div>
        </div>
        <?php get_template_part('include/footer'); ?>
  
      </div>
      <?php get_template_part('include/mobile-menu');?>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
