$(document).ready(function (  ) {
	$form = $('#reg-form');
	$form.submit(function (  ) {
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "index.php",
			data: form_data
		}).done(function (  ) {
			alert("Ваше письмо отправлено. Мы свяжемся с вами в течение суток");
			setTimeout(function (  ) {
				$form.trigger('reset')
			}, 500)
		});
		return false;
	});
});