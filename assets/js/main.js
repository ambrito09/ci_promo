;(function(){
	// Menu settings
	$('#menuToggle, .menu-close').on('click', function(){
		$('#menuToggle').toggleClass('active');
		$('body').toggleClass('body-push-toleft');
		$('#theMenu').toggleClass('menu-open');
	});

    var owl = $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('.right').click(function() {
        owl.trigger('next.owl.carousel');
    });
// Go to the previous item
    $('.left').click(function() {
        owl.trigger('prev.owl.carousel');
    });

    productDetailGallery(4000);

    $('.product-slider').owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        afterInit: function() {
            $('.product-slider .item').css('visibility', 'visible');
        }
    });

})(jQuery);

/* product detail gallery */
function productDetailGallery(confDetailSwitch) {
    $('.thumb:first').addClass('active');
    timer = setInterval(autoSwitch, confDetailSwitch);
    $(".thumb").click(function(e) {

            switchImage($(this));
            clearInterval(timer);
            timer = setInterval(autoSwitch, confDetailSwitch);
            e.preventDefault();
        }
    );
    $('#mainImage').hover(function() {
        clearInterval(timer);
    }, function() {
        timer = setInterval(autoSwitch, confDetailSwitch);
    });

    function autoSwitch() {
        var nextThumb = $('.thumb.active').closest('div').next('div').find('.thumb');
        if (nextThumb.length == 0) {
            nextThumb = $('.thumb:first');
        }
        switchImage(nextThumb);
    }

    function switchImage(thumb) {

        $('.thumb').removeClass('active');
        var bigUrl = thumb.attr('href');
        thumb.addClass('active');
        $('#mainImage img').attr('src', bigUrl);
    }
}