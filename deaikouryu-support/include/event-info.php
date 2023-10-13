<?php
  $page_id = get_page_by_path('event-info');  //〇〇スラッグ名が入ります
  $page = get_post( $page_id );
    echo $page -> post_content;  //本文を取得
?>