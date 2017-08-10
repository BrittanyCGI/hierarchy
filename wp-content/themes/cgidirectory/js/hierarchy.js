$(document).ready(function() {

	$('#NXT').on('click', function(){
		showHideTrees(this);
	});

	$('#ELL').on('click', function(){
		showHideTrees(this);
	});

	$('#CGI').on('click', function(){
		showHideTrees(this);
	});

$('.tier-4').has('.tier-3-4-row').removeClass('tier-4').addClass('no-padding');

function showHideTrees(selector){
	$('.current').removeClass('current');
	$('.shown').toggleClass('shown hidden')
	$(selector).toggleClass('current');
	var slug = $(selector).attr('id');
	var tree_id = '#' + slug + '-tree';
	$(tree_id).toggleClass('shown hidden');
	console.log(tree_id);
};




});