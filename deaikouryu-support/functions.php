<?php
define("DIRE", get_template_directory_uri());
function add_async_defer_script($url) {
    if (strpos($url, '#async'))
    return str_replace('#async', '', $url)."' async='async";
    elseif (strpos($url, '#defer'))
      return str_replace('#defer', '', $url)."' defer='defer";
    else
      return $url;
  }
  add_filter('clean_url', 'add_async_defer_script', 11, 1);
   

  function enqueue_scripts() {
    $version = '1.0.0';
    $style_version = filemtime(get_stylesheet_directory() . '/style.css');
    $script_version = filemtime(get_stylesheet_directory() . '/scripts/main.min.js');
    wp_enqueue_style('css-reset',DIRE.'/styles/vendors/css-reset.css',array(), $version);    
    wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800&family=Zen+Kaku+Gothic+Antique:wght@400;500;700;900&family=Zen+Maru+Gothic:wght@400;500;700;900&display=swap', array(), null);
    wp_enqueue_style('swiper-bundle.min.css',DIRE.'/styles/vendors/swiper-bundle.min.css',array(), $version);
    wp_enqueue_style('style.css',DIRE.'/style.css',array(), $style_version);
    wp_enqueue_script('fontawesome','https://kit.fontawesome.com/2bf622374b.js', false);
    wp_enqueue_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', false);
    wp_enqueue_script('jquery.js', DIRE.  '/scripts/libs/jquery.min.js#defer', array(), $version);
    wp_enqueue_script('scroll-polyfill.js', DIRE.  '/scripts/vendors/scroll-polyfill.js#defer', array(), $version);
    wp_enqueue_script('gsap.min.js', DIRE.  '/scripts/vendors/gsap.min.js#defer', array(), $version);
    wp_enqueue_script('swiper-bundle.min.js', DIRE.  '/scripts/vendors/swiper-bundle.min.js#defer', array(), $version);
    wp_enqueue_script('hero-slider.js', DIRE.  '/scripts/libs/hero-slider.min.js#defer', array(), $version);
    wp_enqueue_script('scroll.js', DIRE.  '/scripts/libs/scroll.min.js#defer', array(), $version);
    wp_enqueue_script('text-animation.js', DIRE.  '/scripts/libs/text-animation.min.js#defer', array(), $version);
    wp_enqueue_script('mobile-menu.js', DIRE.  '/scripts/libs/mobile-menu.min.js#defer', array(), $version);
    wp_enqueue_script('main.js', DIRE.  '/scripts/main.min.js#defer', array(), $script_version);
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
  return 150; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );

// function twpp_change_excerpt_more( $more ) {
//   $html = '<a href="' . esc_url( get_permalink() ) . '">[...続きを読む]</a>';
//   return $html;
// }

// add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );



