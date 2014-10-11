//  always edit init!
$(document).ready(function(){
	$("#form-edit-row-user-password").on('submit', function(e){
		e.preventDefault();
		form = "#form-edit-row-user-password";
		initEditUser("form-edit-row-user-password");	
		return false;
	});
	$("#form-edit-row-user-name").on('submit', function(e){
		e.preventDefault();
		form = "#form-edit-row-user-name";
		initEditUser("form-edit-row-user-name");	
		return false;
	});

});



function initEditUser(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	console.log(form.serialize());
	$.ajax({
		url: '../includes/requests/request-row-edit-user.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			if(vars.error === "ok")
			{
				$('#add-row').modal('hide');
				notif_success();
				$(form)[0].reset();
				window.location = "admin-user.php";
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

function renderHtml(row){
	lengthRow = $('#datatable-lesson_wrapper').find('tbody').find('tr').length + 1;
	addRow = "<tr>";
	addRow += "<td>"+lengthRow+"</td>";
	addRow += "<td>"+row.lesson_description+"</td>";
	addRow += "<td>"+row.lesson_chapter+"</td>";
	addRow += "<td><input type='hidden' name='lesson_id' value'"+row.lesson_id+"'>";
	addRow += '<button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button>';
	addRow += '<button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Remove</button>';
	
	$('#datatable-lesson_wrapper').find('tbody').append(addRow)

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