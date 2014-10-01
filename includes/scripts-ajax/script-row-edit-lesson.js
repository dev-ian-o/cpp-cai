
$(document).ready(function(){

	$("#form-edit-row-lesson").on('submit', function(e){
		e.preventDefault();
		form = "#form-edit-row-lesson";
		initEditLesson("form-edit-row-lesson");	
		// debugger;
		return false;
	});

});



function initEditLesson(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	$.ajax({
		url: '../includes/requests/request-row-edit-lesson.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			if(vars.error === "ok")
			{
				$('#edit-row').modal('hide');
				notif_edit();
				$(form)[0].reset();
				window.location = "index-page.php";
			}
			else
			{
				notif_error();
			}
		},
		complete:function(){
			$(".loader").fadeOut('slow');
			//loader stop here.
		}
	});
}


function notif_success(){
    $.gritter.add({
        title: 'Successfully Added!',
        text: "",
    });
}
function notif_remove(){
    $.gritter.add({
        title: 'Successfully removed!',
        text: "",
    });
}
function notif_edit(){
    $.gritter.add({
        title: 'Successfully edited!',
        text: "",
    });
}

function notif_error(){
    $.gritter.add({
        title: 'Existing Values',
        text: "",
    });
}