(function ($) {
    "use strict"

})(jQuery);


(function($) {
    "use strict"

    //example 2
    var table2 = $('#example2').DataTable({
		searching: true,
		paging:false,
		select: {
            style: 'single'
        },
		info: true,         
		lengthChange:true 
		
	});
	
    table2.on('click', 'tbody tr', function() {
     
            table2.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
       
    })
        
    table2.rows().every(function() {
		table2.row('.selected').remove().draw(false);
    });


	jQuery('.dataTables_wrapper select').selectpicker();
	
})(jQuery);