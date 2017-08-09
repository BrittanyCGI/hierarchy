$(document).ready(function() {
    $('#table-people').DataTable( {
        "paging":   false,
        "info":     false
    } );

   	$('.floor a').contents().unwrap();
   	$('.department a').contents().unwrap();
    $('.employee-name a').contents().unwrap();


	console.log('DataTable');

} );


function obvs(name){
	var emailName = "" + name;

	console.log('working' + emailName);
}


//  code by Alan Dix  © 2004   http://www.meandeviation.com/
//  you are free to use, copy, or distribute this code so long as this notice
//  is included in full and any modifications clearly indicated

function email_addr(name,host,isLink,otherName) {
	
    // var email = name + "@" + host;
    // var linktext = email;   // text to display within link
    // if (otherName) {
    //     linktext = otherName;
    //     isLink = 1;  // only makes sense for live link
    // }
    // if ( isLink ) document.write("<a class='btn btn-primary' href=\"mailto:" + email + "\"><span>");
    // document.write(linktext);
    // if ( isLink ) document.write("</span><span>Send Email</span></a>");
    // document.close();
}


