<?php if(is_home()): ?>
<div class="hero">
  <div class="hero__inner">
               <h1 class="hero__title">鹿児島市企業・団体間交流・<br class="sp2"> 出会いサポート事業</h1>
                  <img src="<?= get_template_directory_uri(); ?>/images/hero-catch.png" alt="トップスライド画像" />  
                  <p class="hero__desc">企業・団体間のつながりで、独身の方の出会いや交流を一緒に応援しませんか？</p>         
                  <img src="<?= get_template_directory_uri(); ?>/images/hero-people.png" alt="トップスライド画像" /> 
                </div>     
          </div>
   <?php elseif(is_archive()):?>
    <?php 
    $category = get_queried_object();
    $cat_slug = $category->category_nicename;
    $cat_name = $category->cat_name;
?>
      <div class="hero-sub">    
        <div class="hero-sub__inner">
              <div class="hero-sub__titles">               
              <h2 class="hero-sub__maintitle "><?=  esc_html($cat_slug); ?></h2>
              <p class="hero-sub__subtitle"><?=  esc_html($cat_name); ?></p>           
              </div>
              <div class="hero-sub__img"> 
                <?php if(is_category('news') || in_category('news')):  ?>      
                  <img src="<?php the_field('news_img',210);?>" alt="お知らせのヘッダー画像">           
                <?php elseif(is_category('works') || in_category('works') ): ?>
                  <img src="<?php the_field('works_img',210);?>" alt="施工実績のヘッダー画像">                     
             <?php endif; ?>
            </div>     
        </div>
      </div>
      <?php elseif(is_single()):?>
    <?php 
    $category = get_the_category();
    $cat_slug = $category[0]->category_nicename;
    $cat_name = $category[0]->name;
?>
      <div class="hero-sub">    
        <div class="hero-sub__inner">
              <div class="hero-sub__titles">               
              <h2 class="hero-sub__maintitle "><?=  esc_html($cat_slug); ?></h2>
              <p class="hero-sub__subtitle"><?=  esc_html($cat_name); ?></p>           
              </div>
              <div class="hero-sub__img"> 
                <?php if(is_category('news') || in_category('news')):  ?>  
                 <img src="<?php the_field('news_img',210);?>" alt="お知らせのヘッダー画像">
                <?php elseif(is_category('works') || in_category('works') ): ?>
                  <img src="<?php the_field('works_img',210);?>" alt="施工実績のヘッダー画像">  
             <?php endif; ?>
            </div>     
        </div>
      </div>
      <?php elseif(is_page()) : ?>
        <?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
?>
        <div class="hero-sub">    
        <div class="hero-sub__inner">
              <div class="hero-sub__titles">
              <h2 class="hero-sub__maintitle "><?php the_title(); ?></h2>
              <p class="hero-sub__subtitle"></p>
              </div>
              
        </div>
      </div>
      <?php elseif(is_404()): ?>
        <div class="hero-sub">    
        <div class="hero-sub__inner">
              <div class="hero-sub__titles">
              <h2 class="hero-sub__maintitle ">404 NOT FOUND</h2>
              </div>
              <div class="hero-sub__img">  
                <?php if(get_field('404_img',210)): ?>      
              <img src="<?php the_field('404_img',210);?>" alt="404ページのヘッダー画像">
              <?php else: ?>
                <img src="<?= get_template_directory_uri(); ?>/images/subtop-image04.png" alt="noimage画像" />
               <?php endif; ?>
            </div>     
        </div>
      </div>
        <?php endif; ?>