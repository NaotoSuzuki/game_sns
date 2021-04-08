//画面に入った時にCSSを発動
// inview.jpと連携しているので注意
$(function() {
  $('.animated').on('inview', function(event, isInView) {
    if (isInView) {
    //表示領域に入った時
      $(this).addClass('fadeInUp');
    }
  });
});

// ナビゲーションハンバーガーメニュー
$(function(){
	$("header .js-btn").on("click",function(){
		$("header").toggleClass("open");
    });
	$("a").on("focus", function(){
		$("a").removeClass("focus");
		$(this).on({
			keyup: function(){
				$(this).addClass("focus");
			}
		});
		if ($("header nav a").is(':focus')) {
			$("header").addClass("open");
		} else {
			$("header").removeClass("open");
		}
    });
		$('header nav a').on('click', function() {
  $('header').toggleClass('open');
})
});


// 返信ボタンクリックオープン
$(function(){
    $(".readmore").on("click", function() {
        $(this).toggleClass("on-click");
        $(".hide-text").slideToggle(100);
    });
});
