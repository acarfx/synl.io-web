(function($) {
    "use strict" 


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();

	var donutChart1 = function(){
		$("span.donut1").peity("donut", {
			width: "110",
			height: "110"
		});
	}
	
	var chartTimeline = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 300,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "New Clients",
					data: [300, 450, 600, 600, 400, 450, 410, 470, 480, 700, 600, 800, 400, 600, 350, 250, 500, 550, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "28%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['#B87EFF'],
			grid: {
				show: false,
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18'],
			  labels: {
			   style: {
				  colors: '#808080',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#808080',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "k";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	
	var recentContacts = function(){
		jQuery('.testimonial-one').owlCarousel({
			loop:true,
			autoplay:true,
			margin:20,
			nav:false,
			rtl:true,
			dots: false,
			navText: ['', ''],
			responsive:{
				0:{
					items:3
				},
				450:{
					items:4
				},
				600:{
					items:5
				},	
				991:{
					items:4
				},			
				
				1200:{
					items:4
				},
				1601:{
					items:5
				}
			}
		})
	}
	
	
	var swiperBox = function(){
		var swiper = new Swiper('.card-swiper', {
		direction: 'vertical',
		slidesPerView: 'auto',
		freeMode: true,
		scrollbar: {
			el: '.swiper-scrollbar',
		},
		mousewheel: true,
		breakpoints: {
			360: {
				direction: 'horizontal',
				slidesPerView: 'auto',
			},
			650: {
				direction: 'horizontal',
				slidesPerView: 2,
				scrollbar: {
					el: '.swiper-scrollbar',
					
				},
			},
			1200: {
				direction: 'vertical',
				slidesPerView: 'auto',
				scrollbar: {
					el: '.swiper-scrollbar',
				},
			},
		}
		 
		});
	}
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){			
				donutChart1();
				chartTimeline();				
				recentContacts();				
				swiperBox();				
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);