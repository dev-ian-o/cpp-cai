//  always edit init!
$(document).ready(function(){
	$("#form-add-row-exam").on('submit', function(e){
		e.preventDefault();
		form = "#form-add-row-exam";
		console.log(this);
		initAddExam("form-add-row-exam");	
		return false;
	});

});



function initAddExam(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	console.log(form.serialize());
	$.ajax({
		url: '../includes/requests/request-row-add-quiz-question.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			if(vars.error === "ok")
			{
				$('#add-row-exam').modal('hide');
				notif_success();
				$(form)[0].reset();
				debugger;
				window.location = "quiz-questions.php";
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