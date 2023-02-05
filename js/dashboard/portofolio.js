(function($) {
    "use strict" 


 var dzChartlist = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	var screenWidth = $(window).width();

	var CurrentGraph = function(){
		 var options = {
          series: [{
          name: 'Buy',
          data: [44, 55, 57, 56, 61]
        }, {
          name: 'Sell',
          data: [76, 85, 101, 98, 87]
        }],
          chart: {
          type: 'bar',
          height: 350,
		  toolbar: {
					show: false
				},
        },
		grid: {	
			show: false
		},
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 0,
          colors: ['transparent'],
		  lineCap: 'smooth',
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun'],
		   labels: {
			show: false,
		   },
			 axisBorder:{
				   show: false,	
			 },
			 axisTicks: {
				show: false,
			},
        },
        yaxis: {
			show: false	
        },
		legend:{
			itemMargin: {
			  horizontal: 15,
			  vertical: 0
			},
			 markers:{
				  radius: 12,
			 },
		},
        fill: {
          opacity: 1
        },
		colors: ['#5F5594', '#71B945'],
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#CurrentGraph"), options);
        chart.render();
	}
	var pieChart = function(){
		 var options = {
          series: [34, 12, 41, 22],
          chart: {
          type: 'donut',
		  width:300
        },
		dataLabels: {
          enabled: false
        },
		stroke: {
          width: 0,
        },
		colors:['#374C98', '#FFAB2D', '#FF782C', '#00ADA3'],
		legend: {
              position: 'bottom',
			  show:false
            },
        responsive: [{
          breakpoint: 768,
          options: {
           chart: {
			  width:200
			},
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart"), options);
        chart.render();
    
	}
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){			
				CurrentGraph();
				pieChart();
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