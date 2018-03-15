$(document).ready(function (  ) {
	$('.send-button').submit(function (  ) {
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "index.php",
			data: form_data,
		})
		return false;
	})
})