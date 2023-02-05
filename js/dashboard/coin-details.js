(function($) {
     "use strict" 


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		var chartBarRunning = function(){
			 var options = {
          series: [{
          data: [300, 300, 100, 250, 350, 500, 400, 400, 200,600]
        },],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:{
			  show:false
		  },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'Week',
          categories: ["Week 01", "Week 02", "Week 03", "Week 04", "Week 05", "Week 06", "Week 07","Week 08","Week 09","Week 010"],
		   labels:{
			    show: true,
				style:{
					 colors:'#808080',
				},
		   },
        },
		 yaxis: {
			labels: {
				 formatter: function (value) {
				  return value + "k";
				},
				style: {
					colors: '#787878',
					fontSize: '13px',
					fontFamily: 'Poppins',
					fontWeight: 400
				},
			},
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
		colors:['#ffab2d']
        };

        var chart = new ApexCharts(document.querySelector("#chartBarRunning"), options);
        chart.render();
		
		
	}
	var chartBarRunning1 = function(){
			 var options = {
          series: [{
          data: [300, 300, 100, 250, 350, 500, 400, 400, 200,600]
        },],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:{
			  show:false
		  },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'Week',
          categories: ["Week 01", "Week 02", "Week 03", "Week 04", "Week 05", "Week 06", "Week 07","Week 08","Week 09","Week 010"],
		  labels:{
			    show: true,
				style:{
					 colors:'#808080',
				},
		   },
        },
		 yaxis: {
			labels: {
				 formatter: function (value) {
				  return value + "k";
				},
				style: {
					colors: '#787878',
					fontSize: '13px',
					fontFamily: 'Poppins',
					fontWeight: 400
				},
			},
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
		colors:['#00ADA3']
        };

        var chart = new ApexCharts(document.querySelector("#chartBarRunning1"), options);
        chart.render();
		
		
	}
	var chartBarRunning2 = function(){
			 var options = {
          series: [{
          data: [300, 300, 100, 250, 350, 500, 400, 400, 200,600]
        },],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:{
			  show:false
		  },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'Week',
          categories: ["Week 01", "Week 02", "Week 03", "Week 04", "Week 05", "Week 06", "Week 07","Week 08","Week 09","Week 010"],
		  labels:{
			    show: true,
				style:{
					 colors:'#808080',
				},
		   },
        },
		 yaxis: {
			labels: {
				 formatter: function (value) {
				  return value + "k";
				},
				style: {
					colors: '#787878',
					fontSize: '13px',
					fontFamily: 'Poppins',
					fontWeight: 400
				},
			},
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
		colors:['#ff782c']
        };

        var chart = new ApexCharts(document.querySelector("#chartBarRunning2"), options);
        chart.render();
		
		
	}
	var chartBarRunning3 = function(){
			 var options = {
          series: [{
          data: [300, 300, 100, 250, 350, 500, 400, 400, 200,600]
        },],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:{
			  show:false
		  },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'Week',
          categories: ["Week 01", "Week 02", "Week 03", "Week 04", "Week 05", "Week 06", "Week 07","Week 08","Week 09","Week 010"],
		  labels:{
			    show: true,
				style:{
					 colors:'#808080',
				},
		   },
        },
		 yaxis: {
			labels: {
				 formatter: function (value) {
				  return value + "k";
				},
				style: {
					colors: '#787878',
					fontSize: '13px',
					fontFamily: 'Poppins',
					fontWeight: 400
				},
			},
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
		colors:['#374c98']
        };

        var chart = new ApexCharts(document.querySelector("#chartBarRunning3"), options);
        chart.render();
		
		
	}
	
	var handleDaterange = function(){
		$('.input-daterange-timepicker').daterangepicker({
			timePicker: true,
			format: 'MM/DD/YYYY h:mm A',
			timePickerIncrement: 30,
			timePicker12Hour: true,
			timePickerSeconds: false,
			buttonClasses: ['btn', 'btn-sm'],
			applyClass: 'btn-danger',
			cancelClass: 'btn-inverse'
		});
	}
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){			
				chartBarRunning();			
				chartBarRunning1();			
				chartBarRunning2();			
				chartBarRunning3();			
				handleDaterange();			
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