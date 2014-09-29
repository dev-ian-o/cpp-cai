
$('document').ready(function(){
	$('.sub-chapter-link').on('click',function(e){
		$('.sub-chapter-link').removeClass('active');
		$(e.target).addClass('active');
		sub_chapter = $(this).find('input[type="hidden"]').val();
		sub_chapter = "sub_chapter="+sub_chapter+"&fetch_sub_chapter=true";
		init(sub_chapter);
	})
});


function init(form){
	console.log("fetching");
	$(".loader").fadeIn('fast');

	$.ajax({
		url: '../includes/requests/request-index.php',
		type: 'POST',
		data: form,
		dataType: 'json',
		success: function(results){
			var vars = results;
			$(".content-chapter").html(vars[0].contentHTML);
			// debugger;
			$(".lesson-title").html(vars[0].lesson_sub_description);
			// console.log(vars);
							
		},
		complete:function(){
			$(".loader").fadeOut('slow');
			//loader stop here.
		}
	});
}
