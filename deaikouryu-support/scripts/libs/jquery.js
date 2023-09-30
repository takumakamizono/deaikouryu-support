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

$(window).on("load", function () {
  var url = $(location).attr("href");
  if (url.indexOf("#") != -1) {
    var anchor = url.split("#");
    var target = $("#" + anchor[anchor.length - 1]);
    if (target.length) {
      var pos = Math.floor(target.offset().top) - 200;
      $("html, body").animate({ scrollTop: pos }, 500);
    }
  }
});
