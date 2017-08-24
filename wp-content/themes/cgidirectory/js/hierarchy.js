$(document).ready(function() {


	if (Cookies.get('NXT') == undefined && Cookies.get('ELL') == undefined && Cookies.get('SNP') == undefined){
	Cookies.set('CGI', true);
	}

	// Cookies API allows current tree to display upon refresh, cookies set to expire in 3 days

	$('#NXT').click(function(){
		showHideTrees(this);
		Cookies.set('NXT', true, { expires: 3 });
		Cookies.set('CGI', false, { expires: 3 });
		Cookies.set('ELL', false, { expires: 3 });
		Cookies.set('SNP', false, {expires: 3});
	});

	$('#ELL').on('click', function(){
		showHideTrees(this);
		Cookies.set('ELL', true, { expires: 3 });
		Cookies.set('CGI', false, { expires: 3 });
		Cookies.set('NXT', false, { expires: 3 });
		Cookies.set('SNP', false, {expires: 3});
	});

	$('#CGI').on('click', function(){
		showHideTrees(this);
		Cookies.set('CGI', true, { expires: 3 });
		Cookies.set('NXT', false, { expires: 3 });
		Cookies.set('ELL', false, { expires: 3 });
		Cookies.set('SNP', false, {expires: 3});
	});

	$('#SNP').on('click', function(){
		showHideTrees(this);
		Cookies.set('SNP', true, { expires: 3 });
		Cookies.set('CGI', false, { expires: 3 });
		Cookies.set('NXT', false, { expires: 3 });
		Cookies.set('ELL', false, { expires: 3 });
	});

$('.tier-4').has('.tier-3-4-row').removeClass('tier-4').addClass('no-padding');

function showHideTrees(selector){
	$('.current').removeClass('current');
	$('.shown').toggleClass('shown hidden')
	$(selector).toggleClass('current');
	var slug = $(selector).attr('id');
	var tree_id = '#' + slug + '-tree';
	$(tree_id).toggleClass('shown hidden');

};



if(Cookies.get('CGI') == 'true'){
    $('#CGI').click();
} 
else if(Cookies.get('ELL') == 'true'){
    $('#ELL').click();
} 
else if(Cookies.get('NXT') == 'true'){
    $('#NXT').click();
}
else if(Cookies.get('SNP') == 'true'){
    $('#SNP').click();
}

});