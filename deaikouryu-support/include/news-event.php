<section class="news-event" >
 

                <div  class="news-event__inner">
                <h3 class="section-titles">出会い応援団体の主催イベント</h3>
               
                <?php
                
                     $args=[
                       'post_type'=> 'post',
                       'category_name' => 'event',
                       'posts_per_page' => 5,        
                     ];
                     $the_query = new WP_Query($args);
                    ?>
                  <?php if($the_query->have_posts()): ?>       
                       
                  <ul class="news-event__list appear right"> 
              <?php while($the_query->have_posts()):$the_query->the_post(); ?>
               
            <?php get_template_part('include/news-inside'); ?>
            <?php endwhile; ?>
                  </ul>
                  <div class="news-event__btn appear up">
                <?php
                      $news = get_term_by('slug','event','category');
                      $news_link = get_term_link($news,'category')
                      ?>
                    <a href="<?= esc_url($news_link); ?>"  class="btn slide-bg item">詳しくはコチラ</a>
                  </div>
                  <?php else: ?>
                    <div class="notice__notinfo">
                      <p>新しい情報はありません</p>
                     
                      <div class="notice__btn">
                      <a class="btn slide-bg" href="<?= esc_url(home_url('/')); ?>">トップページへ戻る</a> 
                      </div>
                    </div>
           <?php endif; ?>
             <?php wp_reset_postdata(); ?>                
                </div>
            
              </section>
