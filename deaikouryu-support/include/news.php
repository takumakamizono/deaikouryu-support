<section class="news" >

                <div  class="news__inner">
                <div  class="news__content">
                <?php
                     $args=[
                       'post_type'=> 'post',
                       'category_name' => 'news',
                       'posts_per_page' => 5,        
                     ];
                     $the_query = new WP_Query($args);
                    ?>
                  <?php if($the_query->have_posts()): ?> 
                                
                  <ul class="news__list appear right"> 
              <?php while($the_query->have_posts()):$the_query->the_post(); ?>
              <?php the_category(); ?> 
            <?php get_template_part('include/news-inside'); ?>
            <?php endwhile; ?>
                  </ul>
                  <div class="news__btn appear up">
                <?php
                      $news = get_term_by('slug','news','category');
                      $news_link = get_term_link($news,'category')
                      ?>
                    <a href="<?= esc_url($news_link); ?>"  class="btn slide-bg item">もっと見る</a>
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
                </div>
            
              </section>
