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