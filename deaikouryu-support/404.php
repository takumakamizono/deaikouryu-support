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
       
            <div class="page-content">
              <?php get_template_part('include/breadcrumb'); ?> 
              <div class="page-content__inner">
             <div class="page-404">
                <p>お探しのページは見つかりませんでした。</p>
                <p>恐れ入りますが、下のリンクからトップページへお戻りください。</p>

                <div class="page-404__btn">
                    <a class="btn" href="<?= home_url("/") ?>">トップページへ戻る</a>
                </div>
             </div>
                
        </div>
          </div>        
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
