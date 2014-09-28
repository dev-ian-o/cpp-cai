
$(document).ready(function(){

	$("#form-exam").on('submit', function(e){
		e.preventDefault();
		form = "#form-exam";
		// init("form-exam");
		console.log($(form).serialize());	
		return false;
	});

});


function gen_key(){
    var hash = "";
    var key = "";
    var x = 100;
    while(x != 0){
        hash += Math.random(0.5).toString(36).substr(2,16);
        x--;
    }
    x = 100;
    while(x != 0){
        key += CryptoJS.HmacSHA512("Message", hash);
        x--;
    }
    return JSON.stringify(key);
}
vars= "";	


function init(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');
	form = $('#'+form);
	// console.log(form.serialize());
	debugger;
	$.ajax({
		url: '../../../includes/requests/request.php',
		type: 'POST',
		data: form.serialize(),
		dataType: 'json',
		success: function(results){
			var vars = results;
			$(".output").html(vars.output);
			$(".error-log").html(vars.error);
			console.log(vars.output);
				
		},
		complete:function(){
			$(".loader").fadeOut('slow');
			//loader stop here.
		}
	});
}
