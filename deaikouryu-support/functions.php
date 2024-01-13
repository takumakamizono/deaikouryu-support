<?php
define("DIRE", get_template_directory_uri());


   

  function enqueue_scripts() {
    $version = '1.0.0';
    $style_version = filemtime(get_stylesheet_directory() . '/style.css');
    $script_version = filemtime(get_stylesheet_directory() . '/scripts/main.min.js');
    wp_enqueue_style('css-reset',DIRE.'/styles/vendors/css-reset.css',array(), $version);
    wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800&family=Zen+Kaku+Gothic+Antique:wght@400;500;700;900&family=Zen+Maru+Gothic:wght@400;500;700;900&display=swap', array(), $version);
    wp_enqueue_style('style.css',DIRE.'/style.css',array(),  $style_version);
    wp_enqueue_script('fontawesome','https://kit.fontawesome.com/2bf622374b.js', array(), $version);
    wp_enqueue_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', false);
    wp_enqueue_script('jquery.js', DIRE.  '/scripts/libs/jquery.min.js', array(), $version, true);
    wp_enqueue_script('scroll-polyfill.js', DIRE.  '/scripts/vendors/scroll-polyfill.js', array(), $version, true);
    wp_enqueue_script('scroll.js', DIRE.  '/scripts/libs/scroll.min.js', array(), $version, true);
    wp_enqueue_script('mobile-menu.js', DIRE.  '/scripts/libs/mobile-menu.min.js,', array(), $version, true);
    wp_enqueue_script('main.js', DIRE.  '/scripts/main.min.js', array(), $script_version, true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_scripts');
  
  





add_theme_support('title-tag');
add_filter('document_title_separator','my_document_title_separator');
function my_document_title_separator($sepatator){
    $sepatator = '|';
    return $sepatator;
}
add_filter('document_title_parts','my_document_title_parts');
function my_document_title_parts($title){
 if(is_home()){
  unset($title['tagline']);
  $title['title']= '鹿児島市婚活交流サポート';
 }
 return $title;
}



add_theme_support('menus');
add_theme_support('post-thumbnails');

//category-label
function categories_label() {
  $cats = get_the_category();
foreach($cats as $cat){
  if($cat->parent == 0){
        echo '<li>';
        echo esc_html($cat->name);
        echo '</li>';
    }
  }
}
/**
 * Contact Form 7 "フリガナ"のバリデーション追加
 */
function custom_wpcf7_validate_kana($result,$tag)
{
    $tag   = new WPCF7_Shortcode($tag);
    $name  = $tag->name;
    $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
 
    //全角カタカナ又は平仮名の入力チェック
    if ($name === "your-kana") {
        if(!preg_match("/^[ア-ヶーぁ-ん]+$/u", $value)) {
            $result->invalidate( $tag,"全角カタカナ又は平仮名で入力してください。");
        }
    }
    return $result;
}
add_filter('wpcf7_validate_text', 'custom_wpcf7_validate_kana', 11, 2);
add_filter('wpcf7_validate_text*', 'custom_wpcf7_validate_kana', 11, 2);

//お問い合わせと送信完了（固定ページ）のスラッグをセットする
$contact = 'contact';
$thanks = 'thanks';

//お問い合わせフォームの送信後にサンクスページへ飛ばす
add_action( 'wp_footer', 'redirect_thanks_page' );
function redirect_thanks_page() {
  global $contact;
  global $thanks;
  ?>
  <?php if( is_page($contact)):?>
  <script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      location = '<?php echo home_url('/'.$thanks); ?>'; // 遷移先のURL
    }, false );
  </script>
<?php endif; ?>

<?php

}

function twpp_change_excerpt_length( $length ) {
  return 30; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );




add_filter('use_block_editor_for_post',function($use_block_editor,$post){
  if($post->post_type==='page'){
      if(in_array($post->post_name,['url-link'])){
          remove_post_type_support('page','editor');
          return false;
      }
  }
  return $use_block_editor;
},10,2);



function custom_category_paging_links() {
  $cat = get_the_category();
  if ($cat) {
      $cat_id = $cat[0]->cat_ID;
      $cat_name = $cat[0]->cat_name;
      $link = get_category_link($cat_id);

      $cat_posts = get_posts(array(
          'cat' => $cat_id,
          'posts_per_page' => -1,
          'order' => 'ASC',
          'orderby' => 'date'
      ));
      
      $current_post_index = 0;
      $current_post_id = get_the_ID();
      
      // Find the index of the current post in the sorted category posts
      foreach ($cat_posts as $index => $post) {
          if ($post->ID == $current_post_id) {
              $current_post_index = $index;
              break;
          }
      }
      
      
      
      // Define $prev_post and $next_post based on conditions
      $prev_post = ($current_post_index > 0) ? $cat_posts[$current_post_index - 1] : null;
      $next_post = ($current_post_index < count($cat_posts) - 1) ? $cat_posts[$current_post_index + 1] : null;
      
      if ($prev_post) {
          echo '<li class="postLinks__link postLinks__link-prev"><a href="' . get_permalink($prev_post->ID) . '">前へ</a></li>';
      }
      // Output the "Back to Category" button
      echo '<li class="postLinks__link single__list-btn centered">';
      echo '<a class="btn slide-bg" href="' . esc_url($link) . '">' . esc_html($cat_name) . 'の一覧へ戻る</a>';
      echo '</li>';
      
      if ($next_post) {
          echo '<li class="postLinks__link postLinks__link-next"><a href="' . get_permalink($next_post->ID) . '">次へ</a></li>';
      }
  }
}

