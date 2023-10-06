jQuery(function () {
  var appear = false;
  var pagetop = $("#page_top");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      if (appear == false) {
        appear = true;
        pagetop.stop().animate(
          {
            bottom: "0px",
          },
          300
        );
      }
    } else {
      if (appear) {
        appear = false;
        pagetop.stop().animate(
          {
            bottom: "-50px",
          },
          300
        );
      }
    }
  });
  pagetop.click(function () {
    $("body, html").animate({ scrollTop: 0 }, 500);
    return false;
  });
});

var headerHeight = jQuery("header").outerHeight() + 20;

// ページ内のアンカーへスクロール
jQuery('a[href*="#"]').click(function () {
  var target = jQuery(this.hash === "" ? "html" : this.hash);
  var position = target.offset().top - headerHeight;
  if (target.length) {
    jQuery("html, body").animate({ scrollTop: position }, 500, "swing");

    // #タグをURLに残す場合は削除
    return false;
  }
});

// ページ外のアンカーへスクロール
var urlHash = location.hash;
if (urlHash) {
  var target = jQuery(urlHash);
  var position = target.offset().top - headerHeight;
  // どこからスクロールさせるか ※一番上ならscrollTop(0)
  jQuery("body,html")
    .stop()
    .scrollTop(position - 200);
  setTimeout(function () {
    jQuery("body,html").stop().animate({ scrollTop: position }, 500, "swing");
  }, 100);
}
