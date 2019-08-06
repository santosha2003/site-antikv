$(document).ready(function() {
	$('#registration-form input').keyup(function() {
		var $f = $(this).parents('form');
		$f.find('input[name=s]').val($f.find('input[name=c]').val());
	});
});