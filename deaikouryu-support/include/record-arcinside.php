<li id="post-<?php the_ID(); ?>"<?php post_class('record-arc__item ') ?>>

<a class="record-arc__item-link" href="<?php the_permalink(); ?>">
                    <div class="record-arc__img">
                      <?php if(has_post_thumbnail()): ?>
                     <?php the_post_thumbnail('full'); ?>    
                     <?php else: ?>       
                      <img src="<?= get_template_directory_uri(); ?>/images/company.png" alt="noimage画像"> 
                      <?php endif; ?>
                    </div>
            
            <div class="record-arc__contents">
<time><?php the_time( get_option( 'date_format' ) ); ?></time>  

                    <p class="record-arc__title"><?php the_title(); ?></p>
                    <div class="record-arc__desc">
                      <p><?php the_excerpt(); ?></p>
                    </div>
                    </div>
                    </a>
                     </li>
