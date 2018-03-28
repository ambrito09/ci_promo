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
    })
// Go to the previous item
    $('.left').click(function() {
        owl.trigger('prev.owl.carousel');
    })

})(jQuery)