$(function(){

	addAndEditUsingAjax();
	deleteUsingAjax();

});

function addAndEditUsingAjax(){
	$('#btn-form').click(function(event) {

		var formId = '.cmxform';

		event.preventDefault();
		
		$.ajax({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: $(formId).attr('action'),
			type: $(formId).attr('method'),
			data: $(formId).serialize(),
			dataType: 'html',
			success: function(result){
				if ($(formId).find("input:first-child").attr('value') == 'PUT') {
					redirectPage(result);
				}
				else{
					$(formId)[0].reset();
					printSuccessMessage(result);
				}
			},
			error: function(){
				console.log('Error');
			}
		});
	});
}

function deleteUsingAjax(){
	$('.btn-danger').click(function(event) {
		event.preventDefault();

		var row = $(this).parents('tr');
		var form = $('#myForm');

		$.ajax({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: form.attr('action').replace(':ID', row.data('id')),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'html',
			success: function(result){
				row.fadeOut();
				printSuccessMessage(result);
			},
			error: function(){
				console.log('Error');
			}
		});
	});
}


function printSuccessMessage(message){

	$("#success_message").append(
	'<div id="myAlert" class="alert alert-success">'+
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>'+
	'</button>'+
	'<div id="message">'+ jQuery.parseJSON(message).message +'</div>'+
'</div>'
	);
	$("#myAlert").delay(3000).fadeOut();
}

function redirectPage(result){
	var $jsonObject = jQuery.parseJSON(result);
	$(location).attr('href',$jsonObject.url);
}
