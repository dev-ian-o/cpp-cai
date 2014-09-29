
$(document).ready(function(){
	$("#form-add-row-sub-lesson").on('submit', function(e){
		e.preventDefault();
		form = "#form-add-row-sub-lesson";
		initAddSubLesson("form-add-row-sub-lesson");	
		return false;
	});

});



function initAddSubLesson(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	console.log(form.serialize());
	$.ajax({
		url: '../includes/requests/request-row-add-sub-lesson.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			if(vars.error === "ok")
			{
				$('#add-row-sub').modal('hide');
				notif_success();
				$(form)[0].reset();
				window.location = "index-page.php";
				// renderHtml(vars);
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