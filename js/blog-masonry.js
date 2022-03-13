//isotope setting(portfolio)
var $blogs = $('.blog-content');
	$blogs.imagesLoaded(function () {
		$blogs.isotope();
	});

//waiting function
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();


//resize after 1000 second
$(window).resize(function() {
    delay(function(){
   $('.blog-content').isotope('layout');
    }, 400);
});