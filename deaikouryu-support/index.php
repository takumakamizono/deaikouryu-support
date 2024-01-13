<!DOCTYPE html>
<html lang="ja">
  <head>
  <?php get_header();?>
  </head>
  <body>
  <?php get_template_part('include/tag-manager'); ?>
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
               <section  <?php post_class('notice') ?>>
                <?php get_template_part('include/breadcrumb'); ?> 
                   

                <div class="notice__inner"> 

                  <?php if(have_posts()): ?>                
               
                    <?php while(have_posts()):the_post(); ?>
                    <ul class="notice__content"> 
                    <?php get_template_part('include/news-inside'); ?> 
                    </ul>
                <?php endwhile; ?>           
                  <?php else: ?>
                    <div class="notice__notinfo">
                      <p>新しい情報はありません</p>
                     
                      <div class="notice__btn">
                      <a class="btn slide-bg" href="<?= esc_url(home_url('/')); ?>">トップページへ戻る</a> 
                      </div>
                    </div>
                
                  <?php endif; ?>          
                </div>
                <?php if(function_exists('wp_pagenavi')){wp_pagenavi();}  ?>
              </section>
            </main>
          
          </div>
        </div>
        <?php get_template_part('include/footer'); ?>
        <?php get_template_part('include/join-banner'); ?>

  
      </div>
      <?php get_template_part('include/mobile-menu');?>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
