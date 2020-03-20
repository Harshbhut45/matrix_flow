$(document).ready(function() {
		$('a[href*=#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable

				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});

				return false;
		});
});

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();

		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
	
		// Assign active class to nav links while scolling
		$('.page-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.navigation li a.active').removeClass('active');
						$('.navigation li a').eq(i).addClass('active');

						$('.navigation li').find('.child').hide();
						var is_child = $('.navigation li a').eq(i).hasClass('child');
						if(is_child) {
							$('.navigation li a').eq(i).parent().parent().find('.child').show();
						} else {
							$('.navigation li a').eq(i).parent().find('.child').show();
						}

				}
		});


}).scroll();

