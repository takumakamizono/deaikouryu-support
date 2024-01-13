<div id="post-<?php the_ID(); ?>"<?php post_class('record__item ') ?>>

<a href="<?php the_permalink(); ?>">
                    <div class="record__img">
                      <?php if(has_post_thumbnail()): ?>
                     <?php the_post_thumbnail('full'); ?>    
                     <?php else: ?>       
                      <img src="<?= get_template_directory_uri(); ?>/images/company.png" alt="noimage画像"> 
                      <?php endif; ?>
                    </div>
            
            <div class="record__contents">
            <ul class="cat">
                       <?php categories_label(); ?>
                       </ul>
<time><?php the_time( get_option( 'date_format' ) ); ?></time>  

<div class="record__contents-inner">
                    <p class="record__title"><?php the_title(); ?></p>
                     <div class="record__desc">
                      <p><?php the_excerpt(); ?></p>
                    </div>
                    </div>
                    </div>
                    </a>
                  </div>
