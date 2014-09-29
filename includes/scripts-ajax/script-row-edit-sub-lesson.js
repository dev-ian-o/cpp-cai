
$(document).ready(function(){
	$("#form-edit-row-sub-lesson").on('submit', function(e){
		e.preventDefault();
		form = "#form-edit-row-sub-lesson";
		// console.log('here');
		initEditSubLesson("form-edit-row-sub-lesson");	
		return false;
	});

});



function initEditSubLesson(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	$.ajax({
		url: '../includes/requests/request-row-edit-sub-lesson.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			if(vars.error === "ok")
			{
				$('#edit-row-sub').modal('hide');
				notif_edit();
				console.log(vars);

				$(form)[0].reset();
				window.location = "index-page.php";
			}
			else
			{
				console.log(vars);
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