(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(function() {
    $(window).scroll(function (event) {
		  $(".tocible").addClass("hide");
		});
		$('.tocible').hover(function(){
			$(".tocible").removeClass("hide");
		});

		 /** Initialize active class for on scroll event */
		if($('.tocible a[href^="#"]').length > 0){
	 		$(document).on("scroll", onScroll);
	 	}

		/** Inline Navigation Js */
	  $('.tocible a[href^="#"]').on('click',function (e){
	  e.preventDefault();
	  var target = $(this).attr('href');
	  if($(target).length > 0){
	  $('html, body').stop().animate({
	      'scrollTop':  $(target).offset().top+1
	  }, 900, 'swing', function () {
	     $(document).on("scroll", onScroll);
	      });
	      }
	  });

	  /** Add Class on scroll */
	  function onScroll(event){
	    var scrollPos = $(document).scrollTop();
	    $('.tocible a[href^="#"]').each(function () {
	        var currLink = $(this);
	        var refElement = $(currLink.attr("href"));
	        if(refElement != '#' && $(refElement).length > 0){
	        if(refElement.position().top){
		        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos){
		            $('.tocible ul li a').parent().removeClass("toc_scrolled");
		            currLink.parent().addClass("toc_scrolled");
		        }
		        else{
	            currLink.parent().removeClass("toc_scrolled");
	            }
	          }
	        }
	    });
	  }

	});

})( jQuery );
