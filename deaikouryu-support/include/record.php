<section class="record">
               
                <?php
                     $args=[
                       'post_type'=> 'post',
                       'cat' => [6],
                       'posts_per_page' => 3,
                       
                     ];
                     $the_query = new WP_Query($args);
                    ?>
                      
                <div class="record__inner">
                <h3 class="section-titles">イベント開催実績</h3>
                <div class="record__wrap">

             <?php if($the_query->have_posts()): ?>   
              <?php while($the_query->have_posts()):$the_query->the_post(); ?>
                  <?php get_template_part('include/record-inside'); ?>
                  <?php endwhile; ?>
           <?php else: ?>

<div class="record__notInfo">
                      <p>現在、イベント開催実績は準備中です</p>
                    </div>

            <?php endif; ?>

                  <div class="record__btn appear up">
                  <?php
                      $news = get_term_by('slug','record','category');
                      $news_link = get_term_link($news,'category')
                      ?>
                    <a href="<?= esc_url($news_link); ?>"  class="btn slide-bg item">詳しくはコチラ</a>
                  </div>
                  </div> 
                </div>
              </section>   