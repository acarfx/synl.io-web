(function($) {
    "use strict"


 var dzChartlist =  function(){
	
	var screenWidth = $(window).width();
	var marketChart = function(){
		 var options = {
          series: [{
          name: 'Katılım',
          data: Girişler || []
        },{
			name: 'Sesler',
			data: Sesler || []
		  },{
			name: 'Toplam Üyeler',
			data: Üyeler || []
		  },{
			name: 'Aktif Üyeler',
			data: Aktifler || []
		  }],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:{
			  show:false
		  }
        },
		colors:["#FFAB2D","#00ADA3","#7c7ec0","#710034"],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
        },
		legend:{
			show:false
		},
		grid:{
			borderColor: '#EEEEEE',
		},
		yaxis: {
		  labels: {
			style: {
				colors: '#787878',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
			formatter: function (value) {
			  return value;
			}
		  },
		},
        xaxis: {
          categories: Günler || ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
		  labels:{
			  style: {
				colors: '#787878',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
		  }
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#marketChart"), options);
        chart.render();
	}
	
	var flotLine3 = function(){
		
		var plot = $.plot($('#flotLine3'), [
			{
				data: [[0, 14], [1, 10], [2, 12], [3, 13], [4, 35], [5, 30], [6, 14]],
				label: 'Bot Gecikme Durumu',
				color: '#EB8153'
			},
			{
				data: [[0, 1], [1, 2], [2, 5], [3, 3], [4, 5], [5, 6], [6, 9]],
				label: 'API Gecikme Durumu',
				color: '#ff6161'
			}
		],
		{
			series: {
				lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
			},
			points: {
				show: true,
			},
			legend: {
				noColumns: 1,
				position: 'nw'
			},
			grid: {
				hoverable: true,
				clickable: true,
				borderColor: '#ddd',
				borderWidth: 0,
				labelMargin: 5,
				backgroundColor: 'transparent'
			},
			yaxis: {
				min: 0,
				max: 50,
				color: 'transparent',
				font: {
					size: 10,
					color: '#fff'
				}
			},
			xaxis: {
				color: 'transparent',
				font: {
					size: 10,
					color: '#fff'
				}
			}
		});
	}
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
					marketChart();
					flotLine3();	
					
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1250); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);