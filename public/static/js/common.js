// ------------------ link class and blank

$(function(){
	$("a[href^='http']").not('[href*="'+location.hostname+'"]').attr("target","_blank");
	$("main a[href$='zip']").addClass("zip");
	$("main a[href$='pdf']").attr("target","_blank").addClass("pdf");
});



// ------------------ Key focus

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
