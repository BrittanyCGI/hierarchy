$(document).ready(function() {
    $('#table-people').DataTable( {
        "paging":   false,
        "info":     false
    } );


    $('#table-people a').click(function( event ){
		event.preventDefault();

		//identify link
	    $link = $(this);

	    // if employee's name is clicked
        if($link.parents('.employee-name').length){
        	if ($link.parents('.selected').length) {
        		$( '#off-canvas' ).removeClass( "open" );
        		$('.selected').removeClass('selected');
        	} else{
        		$( '#off-canvas' ).addClass( "open" );
				$('.selected').removeClass('selected');
				$( this ).closest('tr').addClass('selected');
        	}
        }


        // if a floor is selected
        if($link.parents('.floor').length){
        	alert('find floor');
        	 $('#table-people_wrapper > .row > .col-sm-6').append( "<p class='filter'>Showing only Floor</p>" );
        }


        // if a department is selected
        if($link.parents('.department').length){
        	alert('find department');
        	 $('#table-people_wrapper > .row > .col-sm-6').append( "<p class='filter'>Showing only Department</p>" );
        }


	});


    // close off canvas section
    $('#off-canvas .btn-close').click(function( event ){
        event.preventDefault();
        $( '#off-canvas' ).removeClass( "open" );
        $('.selected').removeClass('selected');
    });

} );