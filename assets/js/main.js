;(function ($) {
	
	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 100, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};



	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};


	var screenHeight = function() {

		if ( $(window).width() > 768 && !isMobile.any() ) {
			$('.js-dt, .js-dtc').css('min-height', $(window).height());
		} else {
			$('.js-dt, .js-dtc').css('min-height', '');
		}
		$(window).resize(function(){
			if ( $(window).width() > 768 && !isMobile.any() ) {
				$('.js-dt, .js-dtc').css('min-height', $(window).height());
			} else {
				$('.js-dt, .js-dtc').css('min-height', '');
			}
		});
		
	};

	var countDown = function() {

		simplyCountdown('.simply-countdown-one', {
			year: date_data.year,
			month: date_data.month,
			day: date_data.day
		});

	};
	
	
	
	$(function(){
		contentWayPoint();
		loaderPage();
		screenHeight();
		countDown();
	});

	

}(jQuery));


// Dark Mode
const rightFooter = document.getElementById("block-12");
const btn = rightFooter.querySelector("p");
const body = document.getElementsByTagName("body");
const numbers = document.getElementsByClassName("simply-amount");
console.log(btn.innerText)
	btn.addEventListener("click", function(){

		if(body[0].style.background != "rgb(31, 28, 38)"){
			console.log("I am from if")
			body[0].style.background = "rgb(31, 28, 38)"
			body[0].style.color = "white";
			for (let i = 0; i < numbers.length; i++) {
				let value = numbers[i];
				value.style.color = "white";
			  }
		}
		else{
		console.log("I am from else")
			body[0].style.background = "white"
			body[0].style.color = "black";
			for (let i = 0; i < numbers.length; i++) {
				let value = numbers[i];
				value.style.color = "black";
			  }
		}
		
		if(btn.innerText === "Click For Dark"){
			btn.innerText = "Click For Light"
			btn.style.background = "#0c2f66";
		}
		else{
			btn.innerText = "Click For Dark";
			btn.style.background = "";
		}
	})


