( function( $ )
{

	function slide_adjustment()
	{
		var header_slider_section = document.querySelector( '.header-slider-section' ),
		top_slide = document.querySelector( '.top-page-slide' ),
		top_slide_img_holder = top_slide.querySelectorAll( '.top-slide-img-holder' )[0],
		cta_slider_section = document.querySelector( '.desirable-slider-section' ),
		img_for_sizing = new Image(),
		adjustment = window.innerHeight,
		height_set;

		img_for_sizing.src = top_slide_img_holder.getAttribute( 'data-img-url' );
		img_for_sizing.style.width = window.innerWidth + 'px';
		if ( document.querySelector( '#wpadminbar' ) )
		{
			adjustment -= document.querySelector( '#wpadminbar' ).offsetHeight;
		}

		header_slider_section.style.height = adjustment + 'px';
		cta_slider_section.style.height = adjustment + 'px';
		top_slide.style.height = header_slider_section.offsetHeight;
		top_slide.style.width = header_slider_section.offsetWidth;
	}


  window.onresize = function()
	{
		// footer_adjustment();
  };
  
  window.onload = function()
	{
    // footer_adjustment();
    
		/*================================================================
		=            For setting up sliders on the front page            =
		================================================================*/
		if ( document.querySelector( '.header-slider-section' ) ) 
		{
			slide_adjustment();
			
			$( '.top-page-slider-wrap' ).slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 4000,
			  pauseOnFocus: false,
			  pauseOnHover: false,
			  fade: true,
			  dots: false,
			  prevArrow: '<button class="slick-prev" type="button"><i class="far fa-arrow-alt-circle-left"></i></button>',
			  nextArrow: '<button class="slick-next" type="button"><i class="far fa-arrow-alt-circle-right"></i></button>',
			});
		}

		if ( document.querySelector( '.desirable-slider-section' ) ) 
		{
			
			$( '.cta-section-slider-wrap' ).slick({
			  // adaptiveHeight: true,
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 4000,
			  pauseOnFocus: true,
			  pauseOnHover: true,
			  fade: true,
			  dots: false,
			  prevArrow: '<button class="slick-prev" type="button"><i class="far fa-arrow-alt-circle-left"></i></button>',
			  nextArrow: '<button class="slick-next" type="button"><i class="far fa-arrow-alt-circle-right"></i></button>',
			});
		}

		if ( document.querySelector( 'body.home .instagram-wrap') ) 
		{
			var image_containers = document.querySelectorAll( '.wonka-insta-box' );
			var slides_to_show = 0;
			var slides_to_scroll = 0;
			if ( image_containers.length >= 5 ) 
			{
				slides_to_show = 5;
				slides_to_scroll = 3;
			}
			else
			{
				slides_to_show = image_containers.length;
				slides_to_scroll = image_containers.length;
			}
			$( 'body.home .instagram-wrap' ).slick({
			  slidesToShow: slides_to_show,
			  slidesToScroll: slides_to_scroll,
			  autoplay: true,
			  autoplaySpeed: 4000,
			  dots: false,
			  prevArrow: '<button class="slick-prev" type="button"><i class="far fa-arrow-alt-circle-left"></i></button>',
			  nextArrow: '<button class="slick-next" type="button"><i class="far fa-arrow-alt-circle-right"></i></button>',
			  responsive: [
    			{
			      breakpoint: 1200,
			      settings: {
			        slidesToShow: ( slides_to_show < 4) ? slides_to_show: 4,
			        slidesToScroll: slides_to_scroll,
			      }
			    },
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
		        }
		      ],
			});
		}

		if ( document.querySelector( '.wonka-image-viewer' ) ) 
		{
			$( '.wonka-image-viewer' ).slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true,
				mobileFirst: true,
				dots: false,
				prevArrow: '<button class="slick-prev" type="button"><i class="far fa-arrow-alt-circle-left"></i></button>',
				nextArrow: '<button class="slick-next" type="button"><i class="far fa-arrow-alt-circle-right"></i></button>',
				responsive: [
					{
					  breakpoint: 768,
					  settings: 'unslick',
					},
				],
			});
		}
		/*=====  End of For setting up sliders on the front page  ======*/

  };
  
})( jQuery );
