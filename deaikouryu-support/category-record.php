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

              <section class="record-arc">
            <?php get_template_part('include/breadcrumb'); ?>

                <div class="record-arc__inner">
                  <?php if(have_posts()): ?>
                  <ul class="record-arc__list appear right">
                    <?php while(have_posts()):the_post(); ?>
                    <?php get_template_part('include/record-arcinside'); ?>
                    <?php endwhile; ?>
                  </ul>
                  <?php else: ?>
                  <div class="notice__notinfo">
                    <p>現在、イベント開催実績は準備中です</p>
                    <div class="notice__btn">
                      <a
                        class="btn slide-bg"
                        href="<?= esc_url(home_url('/')); ?>"
                        >トップページへ戻る</a
                      >
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
